<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%document}}`.
 */
class m220308_084311_add_name_column_to_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%document}}', 'name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%document}}', 'name');
    }
}
