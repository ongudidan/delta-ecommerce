<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_product}}`.
 */
class m241214_105011_create_cart_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_product}}', [
            'id' => $this->string()->notNull()->unique(),
            'product_id' => $this->string()->defaultValue(null),
            'user_id' => $this->string()->defaultValue(null),
            'quantity' => $this->string()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
            'FOREIGN KEY ([[product_id]]) REFERENCES {{%product}} ([[id]]) ' .
                $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            'FOREIGN KEY ([[user_id]]) REFERENCES {{%user}} ([[id]]) ' .
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
