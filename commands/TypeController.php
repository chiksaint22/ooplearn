<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class TypeController extends \yii\console\Controller
{
    public function actionType()
    {
        Yii::$app->db->createCommand()->batchInsert('type_access', ['key', 'name', 'created_at', 'updated_at'], [
            ['Public', 'Публичный', date('d.m.y'), date('d.m.y') ],
//            ['U-private', 'Условно-приватный'],
//            ['Private', 'Приватный'],
        ])->execute();

        return ExitCode::OK;
    }

}