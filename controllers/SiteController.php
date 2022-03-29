<?php

namespace app\controllers;

use mdm\admin\controllers\UserController;
use yii\data\ActiveDataProvider;
use app\models\Document;
use app\models\Date;

class SiteController extends UserController
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Document::find()
//                ->with('type'),
                ->where(['type_access_id' => '1']),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
        ]);

        $day = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['>', 'date', date('y.m.d', strtotime('-1 day'))])
            ->count();
        $month = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['>', 'date', date('y.m.d', strtotime('-31 day'))])
            ->count();
        $year = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['>', 'date', date('y.m.d', strtotime('-1 year'))])
            ->count();

        $model = new Date();

        if (($this->request->isPost) && $model->validate()) {
            $date = \Yii::$app->request->post();
            $date1 = isset($date['date_from']) ? $date['date_from'] : null;
            $date2 = isset($date['date_to']) ? $date['date_to'] : null;
            $date_from = \Yii::$app->formatter->asDate($date1, 'php:Y-m-d');
            $date_to = \Yii::$app->formatter->asDate($date2, 'php:Y-m-d');
            $model->date_from = $date_from;
            $model->date_to = $date_to;
            }

        $date_def1 = date('Y-m-01');
        $date3 = isset($date_from) ? $date_from : $date_def1;
        $date_def_from = \Yii::$app->formatter->asDate($date3, 'php:d.m.Y');

        $date_def2 = date('Y-m-t');
        $date4 = isset($date_to) ? $date_to : $date_def2;
        $date_def_to = \Yii::$app->formatter->asDate($date4, 'php:d.m.Y');

        $public = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access_id', '1'])
            ->andWhere(['>=', 'date', $model->date_from ])
            ->andWhere(['<=', 'date', $model->date_to])
            ->count();

        $uprivate = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access_id', '2'])
            ->andWhere(['>=', 'date', $model->date_from ])
            ->andWhere(['<=', 'date', $model->date_to])
            ->count();

        $private = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access_id', '3'])
            ->andWhere(['>=', 'date', $model->date_from ])
            ->andWhere(['<=', 'date', $model->date_to])
            ->count();

                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'day' => $day,
                    'month' => $month,
                    'year' => $year,
                    'public' => $public,
                    'uprivate' => $uprivate,
                    'private' => $private,
                    'date_def_from' => $date_def_from,
                    'date_def_to' => $date_def_to,
                ]);
            }
}

