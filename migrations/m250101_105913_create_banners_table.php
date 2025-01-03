<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banners}}`.
 */
class m250101_105913_create_banners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable('{{%main_banner}}', [
            'id' => $this->primaryKey(),
            'offer_percentage' => $this->integer(10)->defaultValue(null),
            'title' => $this->string(255)->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'video' => $this->string(255)->defaultValue(null),
            'product_link' => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('{{%banner1}}', [
            'id' => $this->primaryKey(),
            'offer_percentage' => $this->integer(10)->defaultValue(null),
            'title' => $this->string(255)->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'image' => $this->string(255)->defaultValue(null),
            'product_link' => $this->string(255)->defaultValue(null),
        ]);

        $this->createTable('{{%banner2}}', [
            'id' => $this->primaryKey(),
            'offer_percentage' => $this->integer(10)->defaultValue(null),
            'title' => $this->string(255)->defaultValue(null),
            'description' => $this->text()->defaultValue(null),
            'image' => $this->string(255)->defaultValue(null),
            'product_link' => $this->string(255)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banner2}}');
        $this->dropTable('{{%banner1}}');
        $this->dropTable('{{%main_banner}}');
    }
}
