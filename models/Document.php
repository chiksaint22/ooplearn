<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class Document
 * @package app\models
 * @property int $id
 * @property string $path
 * @property object $user
 * @property int $user_id
 * @property int $date
 * @property int $name
 * @property string $type_access
 * @property int $date_from
 * @property int $date_to
 */

class Document extends ActiveRecord
{
    public $date_from;
    public $date_to;

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['path', 'date', 'name', 'type_access'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
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
            'type_access' => 'Приватность',
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
}