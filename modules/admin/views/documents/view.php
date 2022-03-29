<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Document */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Документы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить документ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'Пользователь',
                'value' => function(\app\models\Document $model) {
                    return $model->user->username;

                }
            ],
            [
                'attribute' => 'Дата загрузки',
                'format' => ['date', 'php:d.m.y'],
                'value' => function(\app\models\Document $model) {
                    return $model->date;

                }
            ],
            [
                'attribute' => 'Название документа',
                'value' => function(\app\models\Document $model) {
                    return Html::a(Html::encode($model->name), ['documents/download', 'id' => $model->id]);
                },
                'format' =>'raw',
            ],
            [
                    'attribute' => 'Приватность',
                    'value' => function(\app\models\Document $model) {
                    return $model->type->name;
                }
            ]
        ],
    ]) ?>
</div>
