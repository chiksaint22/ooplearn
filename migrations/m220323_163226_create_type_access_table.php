<?php

use yii\db\Migration;
use yii\behaviors\TimestampBehavior;

/**
 * Handles the creation of table `{{%type_access}}`.
 */
class m220323_163226_create_type_access_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_access}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        Yii::$app->db->createCommand()->batchInsert('type_access', ['key', 'name', 'created_at', 'updated_at'], [
            ['Public', 'Публичный', time(), time()],
            ['U-private', 'Условно-приватный', time(), time()],
            ['Private', 'Приватный', time(), time()],
        ])->execute();
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_access}}');
    }
}
