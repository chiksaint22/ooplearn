<?php


namespace app\models;

use yii\base\BaseObject;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $loadFiles;
    public $path;

    public function rules()
    {
        return [
            [['loadFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'doc, docx, xls, xlsx, pdf', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->loadFiles as $file) {
                $filePath = 'uploads/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($filePath);
                $document = new Document();
                $document->path = $filePath;
                // todo добавить user_id в базу
                $document->save();
            }
            return true;
        } else {
            return false;
        }
    }
}

