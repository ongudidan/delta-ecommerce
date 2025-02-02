<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_info}}`.
 */
class m250105_202947_create_site_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_info}}', [
            'id' => $this->primaryKey(),
            'site_title' => $this->string(255)->defaultValue(null),
            'logo' => $this->text()->defaultValue(null),
            'favicon' => $this->string(255)->defaultValue(null),
            'description' => $this->string(255)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_info}}');
    }
}
