<?php

namespace app\models;

use yii\base\Model;


class  SignupForm extends Model
{
    public $username;
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Это имя пользователя уже занято.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.']
        ];
    }
    public function attributeLabels() {
        return [
            'username' => 'Имя',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторите пароль'
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username= $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        $auth = \Yii::$app->authManager;
        $userRole = $auth->getRole('User');
        $auth->assign($userRole, $user->getId());

        return $user->save();
    }
}

