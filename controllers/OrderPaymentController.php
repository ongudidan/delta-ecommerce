<?php

namespace app\controllers;

use app\models\OrderPayment;
use app\models\OrderPaymentSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderPaymentController implements the CRUD actions for OrderPayment model.
 */
class OrderPaymentController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all OrderPayment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderPaymentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderPayment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrderPayment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new OrderPayment();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    // public function actionIndex()
    // {
    //     $model = new OrderPayment();

    //     return $this->render('index', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionCreate()
    {
        $model = new OrderPayment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // Access token credentials
                $consumerKey = 'aUkyX9eGeZBUNwaAXH5AAFWEJI3WefpAVzKRyIlizPFGgYSa';
                $consumerSecret = 'PDA01jaXZpWz7lVR8IVmG278kGCJPwGVoDn919bzjIMQorsdNCzeXv0cBMdQwBzb';

                // MPesa API credentials
                $BusinessShortCode = '174379';
                $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

                // Form values
                $PartyA = $model->PhoneNumber;
                $Amount = $model->Amount;
                $AccountReference = '2255';
                $TransactionDesc = 'Test Payment';

                // Generate timestamp and password
                $Timestamp = date('YmdHis');
                $Password = base64_encode($BusinessShortCode . $Passkey . $Timestamp);

                // Callback URL
                $CallBackURL = 'https://91cd-41-90-179-109.ngrok-free.app/order-payment/callback';
                // $host = $_SERVER['HTTP_HOST'];
                // $CallBackURL = 'https://' . $host . '/daraja-payment/callback';

                $host =  $_SERVER['HTTP_HOST']; // Get the current host

                if ($host === 'localhost:97') {
                    $CallBackURL = 'https://ecommerce254.wuaze.com/order-payment/callback';

                }elseif($host === 'ecommerce.doubledeals.co.ke'){
                    $CallBackURL = 'https://ecommerce.doubledeals.co.ke/order-payment/callback';
                }




                // Step 1: Get Access Token
                $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

                $curl = curl_init($access_token_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_USERPWD, "$consumerKey:$consumerSecret"); // Basic Auth
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                ]);

                $response = curl_exec($curl);
                curl_close($curl);

                $response = json_decode($response, true);
                $access_token = $response['access_token'] ?? null;

                if (!$access_token) {
                    Yii::$app->session->setFlash('error', 'Failed to generate access token.');
                    return $this->redirect(['create']);
                }

                // Step 2: Initiate STK Push
                $stk_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
                $stk_headers = [
                    "Authorization: Bearer $access_token",
                    'Content-Type: application/json',
                ];

                $stk_post_data = [
                    'BusinessShortCode' => $BusinessShortCode,
                    'Password' => $Password,
                    'Timestamp' => $Timestamp,
                    'TransactionType' => 'CustomerPayBillOnline',
                    'Amount' => $Amount,
                    'PartyA' => $PartyA,
                    'PartyB' => $BusinessShortCode,
                    'PhoneNumber' => $PartyA,
                    'CallBackURL' => $CallBackURL,
                    'AccountReference' => $AccountReference,
                    'TransactionDesc' => $TransactionDesc,
                ];

                $curl = curl_init($stk_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($stk_post_data));
                curl_setopt($curl, CURLOPT_HTTPHEADER, $stk_headers);

                $stk_response = curl_exec($curl);
                curl_close($curl);

                $stk_response = json_decode($stk_response, true);

                // Step 3: Handle the Response
                if (!empty($stk_response['MerchantRequestID']) && !empty($stk_response['CheckoutRequestID'])) {
                    $model->MerchantRequestID = $stk_response['MerchantRequestID'];
                    $model->CheckoutRequestID = $stk_response['CheckoutRequestID'];
                }

                $model->Amount = $Amount;
                $model->PhoneNumber = $PartyA;
                $model->created_at = time();
                $model->updated_at = time();

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'STK Push initiated successfully. Awaiting payment confirmation.');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to save payment details.');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public $enableCsrfValidation = false; // Disable CSRF validation for this action

    public function actionCallback()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            // Read the raw request body
            $mpesaResponse = Yii::$app->request->rawBody;

            // Log the raw M-Pesa response
            $logFile = Yii::getAlias('@runtime/logs/mpesa_callback.log');
            file_put_contents($logFile, $mpesaResponse . PHP_EOL, FILE_APPEND);

            // Decode the JSON response
            $data = json_decode($mpesaResponse, true);

            // Check for JSON decoding errors
            if (json_last_error() !== JSON_ERROR_NONE) {
                Yii::error('JSON decoding error: ' . json_last_error_msg(), __METHOD__);
                return [
                    'ResultCode' => 1,
                    'ResultDesc' => 'Invalid JSON payload',
                ];
            }

            // Validate required fields in the response
            if (!isset($data['Body']['stkCallback'])) {
                Yii::error('Invalid M-Pesa response structure: ' . $mpesaResponse, __METHOD__);
                return [
                    'ResultCode' => 1,
                    'ResultDesc' => 'Invalid Response Structure',
                ];
            }

            // Extract necessary data
            $callback = $data['Body']['stkCallback'];
            $merchantRequestID = $callback['MerchantRequestID'] ?? null;
            $checkoutRequestID = $callback['CheckoutRequestID'] ?? null;
            $resultCode = $callback['ResultCode'] ?? null;
            $resultDesc = $callback['ResultDesc'] ?? null;

            // Log error if the MerchantRequestID is missing
            if (!$merchantRequestID) {
                Yii::error('Missing MerchantRequestID in response: ' . $mpesaResponse, __METHOD__);
                return [
                    'ResultCode' => 1,
                    'ResultDesc' => 'MerchantRequestID Missing',
                ];
            }

            // Find the corresponding OrderPayment record
            $model = OrderPayment::findOne(['MerchantRequestID' => $merchantRequestID]);
            if (!$model) {
                Yii::error("Transaction not found: $merchantRequestID", __METHOD__);
                return [
                    'ResultCode' => 1,
                    'ResultDesc' => 'Transaction Not Found',
                ];
            }

            // Update the model with callback data
            $model->CheckoutRequestID = $checkoutRequestID;
            $model->ResultCode = $resultCode;
            $model->ResultDesc = $resultDesc;

            // If successful transaction, update metadata
            if ($resultCode == 0 && isset($callback['CallbackMetadata']['Item'])) {
                foreach ($callback['CallbackMetadata']['Item'] as $item) {
                    $key = $item['Name'] ?? null;
                    $value = $item['Value'] ?? null;
                    switch ($key) {
                        case 'Amount':
                            $model->Amount = $value;
                            break;
                        case 'MpesaReceiptNumber':
                            $model->MpesaReceiptNumber = $value;
                            break;
                        case 'PhoneNumber':
                            $model->PhoneNumber = $value;
                            break;
                        case 'TransactionDate':
                            $model->TransactionDate = $value;
                            break;
                    }
                }
            }

            // Save the updated model
            if (!$model->save()) {
                Yii::error('Failed to save transaction: ' . json_encode($model->errors), __METHOD__);
                return [
                    'ResultCode' => 1,
                    'ResultDesc' => 'Failed to Save Transaction' . json_encode($model->errors),
                ];
            }

            // Respond with success acknowledgment
            return [
                'ResultCode' => 0,
                'ResultDesc' => 'Confirmation Received Successfully',
            ];
        } catch (\Throwable $e) {
            // Log unexpected errors
            Yii::error('Callback error: ' . $e->getMessage(), __METHOD__);
            return [
                'ResultCode' => 1,
                'ResultDesc' => 'Internal Server Error' . $e->getMessage(),
            ];
        }
    }

    



    /**
     * Updates an existing OrderPayment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderPayment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderPayment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return OrderPayment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderPayment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
