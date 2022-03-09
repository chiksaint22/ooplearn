<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;


/** @var yii\web\View $this */
/** @var ActiveDataProvider $dataProvider */

$this->title = 'Мои документы';
$this->params['breadcrumbs'][] = $this->title;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'=>[
        [
            'attribute' => 'Название документа',
            'value' => function(\app\models\Document $model) {
                return Html::a(Html::encode($model->name), ['fileload/download', 'id' => $model->id]);
            },
            'format' =>'raw',
        ],
        [
            'attribute' => 'Дата загрузки',
            'format' => ['date', 'php:d.m.Y'],
            'value' => 'date'
        ],
        [
            'attribute' => 'Пользователь',
            'value' => function(\app\models\Document $model) {
                return $model->user->username;

            }
        ],
    ]
]);

