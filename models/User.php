<?php

namespace app\models;
use mdm\admin\models\User as UserModel;

/**
 * Class User
 * @property Document[] $documents
 */
class User extends UserModel
{

    public static function tableName()
    {
        return 'user';
    }
    public function getDocuments()
    {
        return $this->hasMany(Document::class, ['user_id'=>'id']);
    }
}
