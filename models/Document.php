<?php


namespace app\models;
use yii\db\ActiveRecord;

/**
 * Class Document
 * @package app\models
 * @property string $path
 * @property int $user_id
 * @property int $date
 *  @property User $user
 * *  @property string $type_access
 */

class Document extends ActiveRecord
{
    public static function tableName()
    {
        return 'document';
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id'=>'user_id']);
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название документа',
            'date' => 'Дата',
            'type_access' => 'Приватность',
        ];
    }
}