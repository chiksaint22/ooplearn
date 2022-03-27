<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin();
    $items = [
        'Публичный' => 'Публичный',
        'Условно-приватный' => 'Условно-приватный',
        'Приватный'=>'Приватный'
    ];
    $params = [
        'prompt' => 'Редактировать приватность...'
    ];
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'type_access_id')->dropDownList($items, $params);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
