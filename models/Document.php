<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class Document
 * @package app\models
 * @property int $id
 * @property string $path
 * @property object $user
 * @property object $type
 * @property int $user_id
 * @property int $date
 * @property int $name
 * @property int $type_access_id
 * @property int $date_from
 * @property int $date_to
 */

class Document extends ActiveRecord
{
    public $date_from;
    public $date_to;

    /**
     * @var mixed|null
     */
//    public $type;

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['path', 'date', 'name', 'type_access_id'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:d.m.y'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'name' => 'Название документа',
            'date' => 'Дата',
            'type_access_id' => 'Приватность',
        ];
    }

    public static function tableName()
    {
        return 'document';
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id'=>'user_id']);
    }
    public function getType()
    {
        return $this->hasOne(Type::class, ['id'=>'type_access_id']);
    }
}