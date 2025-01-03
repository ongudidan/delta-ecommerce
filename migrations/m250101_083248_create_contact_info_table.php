<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_info}}`.
 */
class m250101_083248_create_contact_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        //settings
        $this->createTable('contact_info', [
            'id' => $this->primaryKey(),
            'footer_title' => $this->string(255)->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'address' => $this->string(255)->defaultValue(null),
            'phone' => $this->string(255)->defaultValue(null),
            'email' => $this->string(255)->defaultValue(null),
            'facebook' => $this->string(255)->defaultValue(null),
            'twitter' => $this->string(255)->defaultValue(null),
            'instagram' => $this->string(255)->defaultValue(null),
            'linkedin' => $this->string(255)->defaultValue(null),
            'youtube' => $this->string(255)->defaultValue(null),
            'status' => $this->smallInteger()->defaultValue(null)->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_info}}');
    }
}
