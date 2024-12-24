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
            'MerchantRequestID' => $this->string()->unique(),
            'CheckoutRequestID' => $this->string()->defaultValue(null),
            'ResultCode' => $this->string()->defaultValue(null),
            'ResultDesc' => $this->string()->defaultValue(null)->defaultValue(10), // Keep this one
            'Amount' => $this->string()->defaultValue(null),
            'MpesaReceiptNumber' => $this->string()->defaultValue(null),
            'TransactionDate' => $this->string()->defaultValue(null),
            'PhoneNumber' => $this->string()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
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
