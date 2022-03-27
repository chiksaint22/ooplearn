<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class Type
 * @package app\models
 * @property int $id
 * @property string $key
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 */

class Type extends ActiveRecord
{
    public $id;
    public $key;
    public $name;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['key', 'name'], 'string'],
        ];
    }
    public static function tableName()
    {
        return 'type_access';
    }
    public function getDocuments()
    {
        return $this->hasMany(Document::class, ['type_access_id'=>'id']);
    }
}