<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%collections}}`.
 */
class m210520_191012_add_audit_column_to_collections_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%collections}}', 'updated_by', $this->integer(11));
        $this->addColumn('{{%collections}}', 'created_at', $this->integer());
        $this->addColumn('{{%collections}}', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%collections}}', 'updated_by');
        $this->dropColumn('{{%collections}}', 'created_at');
        $this->dropColumn('{{%collections}}', 'updated_at');
    }
}
