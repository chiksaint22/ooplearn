<?php


namespace app\controllers;

use app\models\Document;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;


class FileloadController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['upload'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['upload'],
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->post() && $model->load(Yii::$app->request->post())) {

            $model->loadFiles = UploadedFile::getInstances($model, 'loadFiles');
            $model->type = \Yii::$app->request->post('type');
            $test = $model->upload();
            }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionDownload($id)
    {
        $model = Document::findOne($id);

        if ($model == null) {
            return $this->goHome();
        }

        $file = Yii::getAlias('@app/web/'.$model->path);

        return Yii::$app->response->sendFile($file);
    }
}


