<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%collections}}`
 */
class m210519_192726_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'url' => $this->text()->notNull(),
            'collection' => $this->integer(11),
        ]);

        // creates index for column `collection`
        $this->createIndex(
            '{{%idx-images-collection}}',
            '{{%images}}',
            'collection'
        );

        // add foreign key for table `{{%collections}}`
        $this->addForeignKey(
            '{{%fk-images-collection}}',
            '{{%images}}',
            'collection',
            '{{%collections}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%collections}}`
        $this->dropForeignKey(
            '{{%fk-images-collection}}',
            '{{%images}}'
        );

        // drops index for column `collection`
        $this->dropIndex(
            '{{%idx-images-collection}}',
            '{{%images}}'
        );

        $this->dropTable('{{%images}}');
    }
}
