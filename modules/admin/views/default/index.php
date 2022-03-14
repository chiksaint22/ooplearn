<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\models\User */

$username = Yii::$app->user->identity->username;
$this->title = Yii::t('app', 'Привет {username}!', ['username' => $username]);
$this->params['breadcrumbs'][] = 'Админ панель';
?>

<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редактор пользователей'), ['users/index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <?= Html::a(Yii::t('app', 'Редактор документов'), ['documents/index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>

