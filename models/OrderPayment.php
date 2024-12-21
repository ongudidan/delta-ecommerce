<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_payment".
 *
 * @property int $id
 * @property string|null $MerchantRequestID
 * @property string|null $CheckoutRequestID
 * @property string|null $ResultCode
 * @property string|null $ResultDesc
 * @property string|null $Amount
 * @property string|null $MpesaReceiptNumber
 * @property string|null $TransactionDate
 * @property string|null $PhoneNumber
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
            [['created_at', 'updated_at'], 'integer'],
            [['MerchantRequestID', 'CheckoutRequestID', 'ResultDesc', 'Amount', 'MpesaReceiptNumber', 'TransactionDate', 'PhoneNumber'], 'string', 'max' => 500],
            [['MerchantRequestID'], 'unique'],
            [['ResultCode'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'MerchantRequestID' => 'Merchant Request ID',
            'CheckoutRequestID' => 'Checkout Request ID',
            'ResultCode' => 'Result Code',
            'ResultDesc' => 'Result Desc',
            'Amount' => 'Amount',
            'MpesaReceiptNumber' => 'Mpesa Receipt Number',
            'TransactionDate' => 'Transaction Date',
            'PhoneNumber' => 'Phone Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
