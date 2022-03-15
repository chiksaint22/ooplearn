<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = Yii::t('app', 'Войти');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа в систему:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')->label('Имя') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>
            <div style="color:#999;margin:1em 0">
                Если вы забыли свой пароль, вы можете <?= Html::a('сбросить его', ['site/request-password-reset']) ?>.
                Если вы новый пользователь вы можете <?= Html::a('зарегистрироваться', ['site/signup']) ?>.
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>