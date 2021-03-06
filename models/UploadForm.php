<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
            ['type', 'required', 'message' => 'Задайте приватность!']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->loadFiles as $file) {
                $filePath = 'uploads/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($filePath);

                $document = new Document();

                $document->name = $file->baseName;
                $document->path = $filePath;
                $document->user_id = Yii::$app->user->id;
                $document->date = date("Y-m-d H:i:s");
                $document->type_access_id = $this->type;
                $document->save();

                    Yii::$app->session->setFlash('success', 'Документы успешно загружены');
            }
            return true;
        } else {
            return false;
        }
    }
}

