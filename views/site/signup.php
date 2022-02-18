<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup container">
    <h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
        'inputOptions' => ['class' => 'col-lg-3 form-control'],
        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    ],
]); ?>
<?= $form->field($model,'username')->textInput(['autofocus'=>true]) ?>
<?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>
