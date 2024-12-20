<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_payment}}`.
 */
class m241220_163339_create_order_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_payment}}', [
            'id' => $this->primaryKey(),
            'transaction_id' => $this->string()->notNull()->unique(),
            'amount' => $this->decimal(10, 2)->notNull(),
            'phone_number' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'reference' => $this->string(),
            'description' => $this->string(),
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
        $this->dropTable('{{%order_payment}}');
    }
}
