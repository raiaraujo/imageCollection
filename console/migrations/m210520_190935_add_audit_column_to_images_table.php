<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%image}}`.
 */
class m210520_190935_add_audit_column_to_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%images}}', 'created_by', $this->integer(11));
        $this->addColumn('{{%images}}', 'updated_by', $this->integer(11));
        $this->addColumn('{{%images}}', 'created_at', $this->integer());
        $this->addColumn('{{%images}}', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%image}}', 'created_by');
        $this->dropColumn('{{%image}}', 'updated_by');
        $this->dropColumn('{{%image}}', 'created_at');
        $this->dropColumn('{{%image}}', 'updated_at');
    }
}
