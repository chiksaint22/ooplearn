<?php


namespace app\controllers;

use app\models\Document;
use Yii;
use yii\base\BaseObject;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;


class FileloadController extends Controller
{
    public function actionUpload()
    {


        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->loadFiles = UploadedFile::getInstances($model, 'loadFiles');
            $test = $model->upload();
            //todo  страница доступна только авторизованным пользователям
//            if ($test) {
//                // file is uploaded successfully
//
//                return $model->save();
//            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}
