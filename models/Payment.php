<?php

namespace app\models;

use app\components\TokenGenerator;
use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string|null $merchant_request_id Merchant Request ID
 * @property string|null $checkout_request_id Checkout Request ID
 * @property int|null $result_code Result Code
 * @property float|null $amount Payment Amount
 * @property string|null $mpesa_receipt_number M-Pesa Receipt Number
 * @property string|null $phone Phone Number
 * @property string|null $external_reference External Reference
 * @property string|null $status Payment Status
 * @property string|null $result_desc Result Description
 * @property float|null $service_wallet_balance Service Wallet Balance
 * @property float|null $payment_wallet_balance Payment Wallet Balance
 * @property string $created_at Creation Time
 * @property string $updated_at Last Update Time
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['result_code'], 'integer'],
            [['amount', 'service_wallet_balance', 'payment_wallet_balance'], 'number'],
            [['result_desc'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['merchant_request_id', 'checkout_request_id', 'mpesa_receipt_number', 'external_reference', 'status'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_request_id' => 'Merchant Request ID',
            'checkout_request_id' => 'Checkout Request ID',
            'result_code' => 'Result Code',
            'amount' => 'Amount',
            'mpesa_receipt_number' => 'Mpesa Receipt Number',
            'phone' => 'Phone',
            'external_reference' => 'External Reference',
            'status' => 'Status',
            'result_desc' => 'Result Desc',
            'service_wallet_balance' => 'Service Wallet Balance',
            'payment_wallet_balance' => 'Payment Wallet Balance',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }




    ///////////////////////////////////////////////

    /**
     * Initiate STK Push
     */
    public static function initiateStkPush($amount, $phone_number, $callbackUrl, $order_id)
    {
        $channel_id = 1240;
        $external_reference = $order_id;
        $basicAuthToken = TokenGenerator::generateBasicAuthToken();

        $payload = json_encode([
            'amount' => floatval($amount),
            'phone_number' => $phone_number,
            'channel_id' => $channel_id,
            'provider' => 'm-pesa',
            'external_reference' => $external_reference,
            'callback_url' => $callbackUrl,
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://backend.payhero.co.ke/api/v2/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: ' . $basicAuthToken,
            ],
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            Yii::error("cURL Error: $error");
            return ['success' => false, 'message' => $error];
        }

        if ($httpCode !== 200 && $httpCode !== 201) {
            Yii::error("HTTP Error: $httpCode - Response: $response");
            return ['success' => false, 'message' => "HTTP Error: $httpCode", 'response' => $response];
        }

        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['success' => false, 'message' => 'Invalid JSON response', 'response' => $response];
        }

        // Save payment details
        $payment = new Payment();
        $payment->amount = $amount;
        $payment->phone = $phone_number;
        $payment->external_reference = $external_reference;
        $payment->checkout_request_id = $decodedResponse['CheckoutRequestID'] ?? null;
        $payment->status = $decodedResponse['status'] ?? null;

        if ($payment->save()) {
            return [
                'success' => true,
                'message' => 'Payment initiated',
                'data' => $payment,
            ];
        }

        Yii::error("Database Error: " . json_encode($payment->errors));
        return ['success' => false, 'message' => 'Failed to save payment details'];
    }

    /**
     * Handle Callback
     */
    public static function handleCallback($callbackData)
    {
        $response = $callbackData['response'] ?? null;

        $order_id = $response['ExternalReference'] ?? null;

        // Read the raw input data
        $callbackData = file_get_contents('php://input');

        // Log the raw callback data to a file
        $logFile = Yii::getAlias('@runtime/logs/M_PESAConfirmationResponse.json');
        file_put_contents($logFile, $callbackData . PHP_EOL, FILE_APPEND);

        if (!$response || !isset($response['CheckoutRequestID'])) {
            return ['success' => false, 'message' => 'Invalid callback data'];
        }

        $payment = self::findOne(['checkout_request_id' => $response['CheckoutRequestID']]);
        if (!$payment) {
            Yii::error("Payment record not found for CheckoutRequestID: " . $response['CheckoutRequestID']);
            return ['success' => false, 'message' => 'Payment not found'];
        }

        $payment->status = $response['Status'] ?? null;
        $payment->mpesa_receipt_number = $response['MpesaReceiptNumber'] ?? null;
        $payment->result_code = $response['ResultCode'] ?? null;
        $payment->result_desc = $response['ResultDesc'] ?? null;

        if ($payment->save()) {
            return ['success' => true, 'message' => 'Payment updated successfully', 'order_id' => $order_id];
        }

        Yii::error("Failed to update payment: " . json_encode($payment->errors));
        return ['success' => false, 'message' => 'Failed to update payment'];
    }

    /**
     * Get Payment Status
     */
    public static function getStatus($external_reference)
    {
        return self::find()->where(['external_reference' => $external_reference])->asArray()->one();
    }
}
