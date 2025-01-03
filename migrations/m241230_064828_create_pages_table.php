<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m241230_064828_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('{{%pages}}', [
        //     'id' => $this->primaryKey(),
        // ]);

        // Create pages table
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'page' => $this->string(),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
