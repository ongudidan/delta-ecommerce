<?php

use yii\db\Migration;

/**
 * Class m241214_073410_create
 */
class m241214_073410_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_image}}', [
            'id' => $this->string()->notNull()->unique(),
            'product_id' => $this->string()->defaultValue(null),
            'image' => $this->string(),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
            'FOREIGN KEY ([[product_id]]) REFERENCES {{%product}} ([[id]]) ' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_image}}');

    }


    protected function buildFkClause($delete = '', $update = '')
    {
        return implode(' ', ['', $delete, $update]);
    }
}
