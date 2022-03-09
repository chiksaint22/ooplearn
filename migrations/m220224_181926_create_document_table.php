<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m220224_181926_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'path'=>$this->string(200),
            'user_id'=>$this->integer(),
            'date'=>$this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
