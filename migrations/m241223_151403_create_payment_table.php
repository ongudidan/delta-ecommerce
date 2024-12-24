<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m241223_151403_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'merchant_request_id' => $this->string()->null()->comment('Merchant Request ID'),
            'checkout_request_id' => $this->string()->null()->comment('Checkout Request ID'),
            'result_code' => $this->integer()->null()->comment('Result Code'),
            'amount' => $this->decimal(10, 2)->null()->comment('Payment Amount'),
            'mpesa_receipt_number' => $this->string()->null()->comment('M-Pesa Receipt Number'),
            'phone' => $this->string(15)->null()->comment('Phone Number'),
            'external_reference' => $this->string()->null()->unique()->comment('External Reference'),
            'status' => $this->string()->null()->comment('Payment Status'),
            'result_desc' => $this->text()->null()->comment('Result Description'),
            'service_wallet_balance' => $this->decimal(15, 2)->null()->comment('Service Wallet Balance'),
            'payment_wallet_balance' => $this->decimal(15, 2)->null()->comment('Payment Wallet Balance'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Creation Time'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')->comment('Last Update Time'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment}}');
    }
}
