<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;


/** @var yii\web\View $this */
/** @var ActiveDataProvider $dataProvider */

$this->title = 'Мои документы';
$this->params['breadcrumbs'][] = $this->title;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'=>[
        [
            'class' => 'yii\grid\SerialColumn'
        ],
        'username',
        [
            'attribute' => 'Загруженные документы',
        ],
        [
            'attribute' => 'Дата загрузки',
            'format' => ['date', 'php:Y-m-d']
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update}'
        ],
    ]
]);
?>

