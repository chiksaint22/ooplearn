<?php
use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Загрузка документов';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'loadFiles[]')->fileInput(['multiple' => true]) ?>

    <div>
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-warning']) ?>
    </div>

<?php ActiveForm::end() ?>