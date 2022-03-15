<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = Yii::t('app', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>
    <?= Html::errorSummary($model)?>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->label('Имя') ?>
            <?= $form->field($model, 'email')->label('Почта') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <?= $form->field($model, 'retypePassword')->passwordInput()->label('Повторите пароль') ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app','Регистрация'), ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

