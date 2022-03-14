<?php

namespace app\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isUser';

    public function execute($user_id, $item, $params)
    {
        return isset($params['document']) ? $params['document']->user_id == $user_id : false;
    }
}