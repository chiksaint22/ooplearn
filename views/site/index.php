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
                return Html::a(Html::encode($model->name), ['documents/download', 'id' => $model->id]);
            },
            'format' =>'raw',
        ],
        [
            'attribute' => 'Дата загрузки',
            'format' => ['date', 'php:Y-m-d'],
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
                return $model->type_access;
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
        Отношение публичных\условно-приватных\приватных
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Публичные: <span class="badge badge-primary badge-pill"><?= $public ?></span></li>
        <li class="list-group-item">Условно-приватные: <span class="badge badge-primary badge-pill"><?= $uprivate ?></span></li>
        <li class="list-group-item">Приватные: <span class="badge badge-primary badge-pill"><?= $private ?></span> </li>
    </ul>

</div>
        Выберите интервал дат:
        <form class="form-group" action="/site/index" method="post">
            <?php
            echo DatePicker::widget([
                'name' => 'date_from',
                'name2' => 'date_to',
                'type' => DatePicker::TYPE_RANGE,
                'separator' => '-',
                'pluginOptions' => ['format' => 'yyyy-mm-dd']]);
            ?>
            <?php
            echo Html :: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []);
            ?>
            <?= Html::submitButton('Выбрать', ['class' => 'btn btn-warning'])?>
        </form>
</div>

