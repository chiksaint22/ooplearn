<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Html;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $loadFiles;
    public $path;
    public $type;

    public function rules()
    {
        return [
            [['loadFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf', 'maxFiles' => 5],
            [['type'], 'integer']
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->loadFiles as $file) {
                $filePath = 'uploads/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($filePath);

                $document = new Document();
                $request = Yii::$app->request;
                $document->name = $file->baseName;
                $document->path = $filePath;
                $document->user_id = Yii::$app->user->id;
                $document->date = date("Y-m-d H:i:s");

                if ($document->load(Yii::$app->request->post())) {
                    $type = $request->post('type');
                    $document->type_access = $type;
                    $document->save();
                    Yii::$app->session->setFlash('success', 'Документы успешно загружены');
                }
                else {
                    Yii::$app->session->setFlash('danger', 'Что-то пошло не так');
                }
            }
            return true;
        } else {
            return false;
        }
    }
}

