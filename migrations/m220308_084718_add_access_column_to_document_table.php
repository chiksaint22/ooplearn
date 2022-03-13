<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%document}}`.
 */
class m220308_084718_add_access_column_to_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%document}}', 'type_access', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%document}}', 'type_access');
    }
}
