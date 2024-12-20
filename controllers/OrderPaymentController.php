<?php

namespace app\controllers;

use app\models\OrderPayment;
use Yii;

use yii\web\Response;

class OrderPaymentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new OrderPayment();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionProcess()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new OrderPayment();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Daraja API Credentials
            $consumerKey = 'aUkyX9eGeZBUNwaAXH5AAFWEJI3WefpAVzKRyIlizPFGgYSa'; // Your app Consumer Key
            $consumerSecret = 'PDA01jaXZpWz7lVR8IVmG278kGCJPwGVoDn919bzjIMQorsdNCzeXv0cBMdQwBzb'; // Your app Consumer Secret
            $businessShortCode = '174379';
            $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

            $timestamp = date('YmdHis');
            $password = base64_encode($businessShortCode . $passkey . $timestamp);
            $callbackUrl = 'https://ecommerce254.wuaze.com//order-payment/callback';

            $amount = $model->amount;
            $partyA = $model->phone_number; // Customer's phone number

            $payload = [
                'BusinessShortCode' => $businessShortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $partyA,
                'PartyB' => $businessShortCode,
                'PhoneNumber' => $partyA,
                'CallBackURL' => $callbackUrl,
                'AccountReference' => '2255',
                'TransactionDesc' => 'Test Payment',
            ];

            // Get Access Token
            $accessToken = $this->getAccessToken($consumerKey, $consumerSecret);

            if (!$accessToken) {
                return ['status' => 'error', 'message' => 'Failed to retrieve access token'];
            }

            // Perform STK Push
            $response = $this->performRequest(
                'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest',
                $payload,
                $accessToken
            );

            if (isset($response['ResponseCode']) && $response['ResponseCode'] == '0') {
                // Save to database
                $model->transaction_id = $response['CheckoutRequestID'] ?? null;
                $model->status = 'Pending';
                $model->created_at = time();
                if ($model->save()) {
                    return ['status' => 'success', 'message' => 'Payment initiated successfully'];
                } else {
                    return ['status' => 'error', 'message' => 'Failed to save payment', 'errors' => $model->errors];
                }
            }

            return ['status' => 'error', 'message' => $response['errorMessage'] ?? 'Unknown error'];
        }

        return ['status' => 'error', 'message' => 'Validation failed', 'errors' => $model->errors];
    }

    public function actionCallback()
    {
        $postData = Yii::$app->request->post();
        Yii::info(json_encode($postData), 'payment-callback'); // Log callback for debugging

        if (!empty($postData['Body']['stkCallback'])) {
            $callbackData = $postData['Body']['stkCallback'];
            $checkoutRequestId = $callbackData['CheckoutRequestID'] ?? null;
            $resultCode = $callbackData['ResultCode'] ?? null;
            $resultDesc = $callbackData['ResultDesc'] ?? null;

            if ($checkoutRequestId) {
                $model = OrderPayment::findOne(['transaction_id' => $checkoutRequestId]);
                if ($model) {
                    // Extract metadata from the callback
                    $metadata = $callbackData['CallbackMetadata']['Item'] ?? [];
                    $reference = null;
                    $amount = null;

                    foreach ($metadata as $item) {
                        if ($item['Name'] === 'MpesaReceiptNumber') {
                            $reference = $item['Value'];
                        }
                        if ($item['Name'] === 'Amount') {
                            $amount = $item['Value'];
                        }
                    }

                    // Update model fields
                    $model->status = ($resultCode == '0') ? 'Success' : 'Failed';
                    $model->description = $resultDesc; // Save transaction description
                    $model->reference = $reference;   // Save reference number
                    $model->updated_at = time();

                    if (!$model->save()) {
                        Yii::error('Failed to update order payment: ' . json_encode($model->errors), 'payment-callback');
                    }
                } else {
                    Yii::error('Transaction not found for ID: ' . $checkoutRequestId, 'payment-callback');
                }
            } else {
                Yii::error('Missing CheckoutRequestID in callback data', 'payment-callback');
            }
        } else {
            Yii::error('Invalid callback data: ' . json_encode($postData), 'payment-callback');
        }
    }


    private function getAccessToken($consumerKey, $consumerSecret)
    {
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $credentials = base64_encode("$consumerKey:$consumerSecret");

        $headers = [
            "Authorization: Basic $credentials",
            'Content-Type: application/json',
        ];

        $response = $this->performRequest($url, [], null, $headers, 'GET');
        return $response['access_token'] ?? null;
    }

    private function performRequest($url, $data, $token = null, $headers = [], $method = 'POST')
    {
        $ch = curl_init($url);

        $defaultHeaders = [
            'Content-Type: application/json',
        ];

        if ($token) {
            $defaultHeaders[] = "Authorization: Bearer $token";
        }

        $finalHeaders = array_merge($defaultHeaders, $headers);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $finalHeaders);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

}
