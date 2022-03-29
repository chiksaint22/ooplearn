<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var ActiveDataProvider $dataProvider */

$this->title = 'Мои документы';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'=>[
        [
            'attribute' => 'Название документа',
            'value' => function(\app\models\Document $model) {
                return Html::a(Html::encode($model->name), ['admin/documents/download', 'id' => $model->id]);
            },
            'format' =>'raw',
        ],
        [
            'attribute' => 'Дата загрузки',
            'format' => ['date', 'php:d.m.y'],
            'value' => 'date'
        ],
        [
            'attribute' => 'Пользователь',
            'value' => function(\app\models\Document $model) {

                return $model->user->username;

            }
        ],
        [
            'attribute' => 'Приватность',
            'value' => function(\app\models\Document $model) {

                return $model->type->name;

            }
        ],

    ]
]);

?>
<div class="row">
    <div class="col-sm-6">
<div class="card">
    <div class="card-header">
        Документов загружено
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">За день: <span class="badge badge-primary badge-pill"><?= $day ?></span> </li>
        <li class="list-group-item">За месяц: <span class="badge badge-primary badge-pill"><?= $month ?></span>  </li>
        <li class="list-group-item">За год: <span class="badge badge-primary badge-pill"><?= $year ?></span>  </li>
    </ul>

</div>
    </div>
    <div class="col-sm-6">
<div class="card">
    <div class="card-header">
        Соотношение документов за период <?= $date_def_from ?> - <?= $date_def_to ?>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Публичные: <span class="badge badge-primary badge-pill">
                <?= $public ?></span></li>
        <li class="list-group-item">Условно-приватные: <span class="badge badge-primary badge-pill">
                <?= $uprivate ?></span></li>
        <li class="list-group-item">Приватные: <span class="badge badge-primary badge-pill">
                <?= $private ?></span> </li>
    </ul>

</div>
        <form class="form-group" action="/site/index" method="post">
            <div class="row" style="margin-bottom: 1rem; margin-top: 1rem ">
                <div class="col-sm-6">

                    <?=
                    DatePicker::widget([
                        'name' => 'date_from',
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => $date_def_from,
                        'options' => ['placeholder' => 'Начальная дата...'],
                        'pluginOptions' => ['autoclose' => true]
                    ]); ?>
                </div>
                <div class="col-sm-6">
                    <?=
                    DatePicker::widget([
                        'name' => 'date_to',
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => $date_def_to,
                        'options' => ['placeholder' => 'Конечная дата...'],
                        'pluginOptions' => ['autoclose' => true]
                    ]); ?>
                </div>
            </div>
            <?php
            echo Html :: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []);
            ?>
            <?= Html::submitButton('Показать', ['class' => 'btn btn-warning'])?>
        </form>


