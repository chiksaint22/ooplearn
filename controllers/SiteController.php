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
                ->where(['type_access' => 'Публичный']),
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
            ->Where(['>', 'date', date('Y-m-d', strtotime('-1 day'))])
            ->count();
        $month = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['>', 'date', date('Y-m-d', strtotime('-31 day'))])
            ->count();
        $year = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['>', 'date', date('Y-m-d', strtotime('-1 year'))])
            ->count();

        $model = new Date();

        if (($this->request->isPost) && $model->validate()) {
            $date = \Yii::$app->request->post();
            $model->date_from = isset($date['date_from']) ? $date['date_from'] : null;
            $model->date_to = isset($date['date_to']) ? $date['date_to'] : null;
            }
        $public = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access', 'публичный'])
            ->andWhere(['>=', 'date', $model->date_from ])
            ->andWhere(['<=', 'date', $model->date_to])
            ->count();

        $uprivate = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access', 'условно-приватный'])
            ->andWhere(['>=', 'date', $model->date_from ])
            ->andWhere(['<=', 'date', $model->date_to])
            ->count();

        $private = (new \yii\db\Query())
            ->select('*')
            ->from('document')
            ->Where(['=', 'type_access', 'приватный'])
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
                    'private' => $private
                ]);
            }
}

