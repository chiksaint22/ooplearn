<?php

namespace app\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isUser';

    public function execute($user, $item, $params)
    {
        return isset($params['documents']) ? $params['documents']->user_id == $user : false;
    }
}