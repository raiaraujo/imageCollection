<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%collections}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210519_164940_create_collections_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%collections}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-collections-created_by}}',
            '{{%collections}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-collections-created_by}}',
            '{{%collections}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-collections-created_by}}',
            '{{%collections}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-collections-created_by}}',
            '{{%collections}}'
        );

        $this->dropTable('{{%collections}}');
    }
}
