<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UploadForm */

$this->title = Yii::t('app', 'Загрузить документы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Документы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
$items = [
    'Публичный' => 'Публичный',
    'Условно-приватный' => 'Условно-приватный',
    'Приватный'=>'Приватный'
];
$params = [
    'prompt' => 'Задайте приватность...'
];
?>
<?= $form->field($model, 'loadFiles[]')->fileInput(['multiple' => true])->label('') ?>

<?= $form->field($model, 'type')->dropDownList($items, $params)->label('Настройки приватности') ?>
<div class="form-group">
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-warning'])?>
</div>
<?php ActiveForm::end(); ?>







