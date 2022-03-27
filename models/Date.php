<?php


namespace app\models;

use yii\base\Model;

/**
 * Class Date
 * @package app\models
 * @property int $date_from
 * @property int $date_to
 */

class Date extends Model

{
    /**
     * {@inheritdoc}
     */

    public $date_from;
    public $date_to;

    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'date', 'format' => 'php:d.m.Y'],
        ];
    }
}