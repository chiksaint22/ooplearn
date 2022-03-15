<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Имя') ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('Пароль')  ?>

    <?= $form->field($model, 'passwordRepeat')->passwordInput(['maxlength' => true])->label('Повторите пароль')  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
