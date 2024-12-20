<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_payment".
 *
 * @property int $id
 * @property string $transaction_id
 * @property float $amount
 * @property string $phone_number
 * @property int $status
 * @property string|null $reference
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class OrderPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'phone_number'], 'required'],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['transaction_id', 'phone_number', 'reference', 'description'], 'string', 'max' => 255],
            [['transaction_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_id' => 'Transaction ID',
            'amount' => 'Amount',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'reference' => 'Reference',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
