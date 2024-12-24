<?php

namespace app\controllers;

use app\components\IdGenerator;
use app\components\TokenGenerator;
use app\models\CartProduct;
use app\models\CartProductSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Order;
use app\models\OrderItem;
use app\models\Payment;
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductSearch;
use app\models\SignupForm;
use app\models\UserAddress;
use app\models\VerifyEmailForm;
use InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $layout = 'FrontLayout';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['logout', 'add', 'cart'],
                    'rules' => [
                        [
                            'actions' => ['logout', 'add', 'cart'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        // 'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $queryParams = $this->request->queryParams;

        $dataProvider = $searchModel->search($queryParams);

        // Set pagination limit to 50
        $dataProvider->pagination = [
            'pageSize' => 50,
        ];

        $productCategories = ProductCategory::find()->all();
        return $this->render('index', [
            'productCategories' => $productCategories,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionPay($id)
    {
        // $order = Order::findOne($id);
        $orderItems = OrderItem::find()->where(['order_id' => $id])->all();

        $totalSellingPrice = OrderItem::find()->where(['order_id' => $id])->sum('selling_price');

        $totalItems = OrderItem::find()->where(['order_id' => $id])->count();


        return $this->render('pay', [
            'totalSellingPrice' => $totalSellingPrice,
            'totalItems' => $totalItems,
            'orderId' => $id,


        ]);
    }
    // {
    //     $model = new Order();
    //     $addresses = UserAddress::find()->where(['user_id' => Yii::$app->user->id])->all();
    //     $cartProducts = CartProduct::find()->where(['user_id' => Yii::$app->user->id])->all();

    //     return $this->render('pay', [
    //         'addresses' => $addresses,
    //         'model' => $model,
    //         'cartProducts' => $cartProducts,

    //     ]);
    // }



    /**
     * Lists all Product models.
     *
     * @return string
     */

    public function actionProducts($category_id = null, $sub_category_id = null)
    {
        $searchModel = new ProductSearch();
        $queryParams = $this->request->queryParams;

        // If category_id is set, filter by it
        if ($category_id !== null) {
            $queryParams['ProductSearch']['category_id'] = $category_id;
        }

        // If sub_category_id is set, filter by it
        if ($sub_category_id !== null) {
            $queryParams['ProductSearch']['product_sub_category_id'] = $sub_category_id;
        }

        $dataProvider = $searchModel->search($queryParams);

        return $this->render('products', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }





    /**
     * Lists all cart Products.
     *
     * @return string
     */
    public function actionCart()
    {
        $searchModel = new CartProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('cart', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays Checkout page.
     *
     * @return string
     */
    public function actionCheckout()
    {
        $model = new Order();
        $addresses = UserAddress::find()->where(['user_id' => Yii::$app->user->id])->all();
        $cartProducts = CartProduct::find()->where(['user_id' => Yii::$app->user->id])->all();

        return $this->render('checkout', [
            'addresses' => $addresses,
            'model' => $model,
            'cartProducts' => $cartProducts,

        ]);
    }

    /**
     * Lists single Product.
     *
     * @return string
     */
    public function actionProductView($id)
    {

        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $this->render('product-view', [
                'model' => $model->findOne(['id' => $id]),
            ]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * add product to cart.
     *
     * @return string
     */

    public function actionAdd()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $productId = Yii::$app->request->post('product_id');
        $quantity = Yii::$app->request->post('quantity', 1);

        if (!$productId || $quantity <= 0) {

            Yii::$app->session->setFlash('error', 'Invalid product or quantity.');

            return $this->redirect(['products']);
        }

        $userId = Yii::$app->user->id;

        // Check if the product already exists in the cart for the logged-in user
        $cartProduct = CartProduct::findOne(['product_id' => $productId, 'user_id' => $userId]);

        if ($cartProduct) {
            // Update the existing quantity
            $cartProduct->quantity = $quantity;
        } else {
            // Create a new cart entry if it does not exist
            $cartProduct = new CartProduct();
            $cartProduct->id = IdGenerator::generateUniqueId();
            $cartProduct->product_id = $productId;
            $cartProduct->quantity = $quantity;
            $cartProduct->user_id = $userId;
        }

        if ($cartProduct->save()) {

            Yii::$app->session->setFlash('success', 'Product added to cart successfully.');

            return $this->redirect(['products']);
        }

        return $this->redirect(['product-view', 'id' => $productId]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }


    public function actionCreateOrder()
    {
        $model = new Order();
        $addresses = UserAddress::find()->where(['user_id' => Yii::$app->user->id])->all();
        $cartProducts = CartProduct::find()->where(['user_id' => Yii::$app->user->id])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->id = IdGenerator::generateUniqueId();
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->id, 'id' => $model->address_id])->one();

                if (isset($address)) {
                    $model->address = $address->address;
                    $model->order_no = $model->generateOrderNo();
                    $model->user_id = Yii::$app->user->id;
                    $model->phone_no = $address->phone_no;
                    $model->first_name = $address->first_name;
                    $model->last_name = $address->last_name;
                    $model->status = 'pending';

                    if ($model->save()) {
                        $orderItemsSaved = true;

                        foreach ($cartProducts as $cartProduct) {
                            $product = Product::findOne($cartProduct->product_id);
                            $orderItem = new OrderItem();
                            $orderItem->id = IdGenerator::generateUniqueId();
                            $orderItem->product_id = $cartProduct->product_id;
                            $orderItem->quantity = $cartProduct->quantity;
                            $orderItem->selling_price = $product->selling_price;
                            $orderItem->order_id = $model->id;

                            if (!$orderItem->save()) {
                                $orderItemsSaved = false;
                                $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($orderItem->getErrors(), 0));
                                Yii::$app->session->setFlash('error', 'Failed to save some Order Items. Errors: <br>' . $errors);
                                break; // Stop further processing on error
                            }
                        }

                        if ($orderItemsSaved) {
                            // Clear the cart for the logged-in user
                            CartProduct::deleteAll(['user_id' => Yii::$app->user->id]);

                            // Send notification email
                            $this->sendOrderNotification($model);

                            // Yii::$app->session->setFlash('success', 'Order created successfully.');
                            return $this->redirect(['pay', 'id' => $model->id]);
                        }
                    } else {
                        $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                        Yii::$app->session->setFlash('error', 'Failed to save the Order. Errors: <br>' . $errors);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Address or Payment method not selected');
                    return $this->render('checkout', [
                        'addresses' => $addresses,
                        'model' => $model,
                        'cartProducts' => $cartProducts,
                    ]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('checkout', [
            'addresses' => $addresses,
            'model' => $model,
            'cartProducts' => $cartProducts,
        ]);
    }

    /**
     * Sends an email notification to the owner.
     *
     * @param Order $order The created order.
     */
    protected function sendOrderNotification($order)
    {
        try {
            $body = "A new order has been placed.<br><br>"
                . "<strong>Order No:</strong> {$order->order_no}<br>"
                . "<strong>Customer Name:</strong> {$order->first_name} {$order->last_name}<br>"
                . "<strong>Phone:</strong> {$order->phone_no}<br>"
                . "<strong>Address:</strong> {$order->address}<br>"
                . "<strong>Items:</strong><br>";

            foreach ($order->orderItems as $item) {
                $body .= "- {$item->product->name} (Qty: {$item->quantity}, Price: {$item->selling_price})<br>";
            }

            Yii::$app->mailer->compose()
                ->setTo('ongudidan@gmail.com') // Replace with your Gmail address
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setSubject("New Order #{$order->order_no}")
                ->setHtmlBody($body)
                ->send();
        } catch (\Exception $e) {
            Yii::error("Failed to send order notification email: " . $e->getMessage(), __METHOD__);
        }
    }



    public function actionOrderSuccess($id)
    {
        $model = Order::findOne($id);

        return $this->render('order-success', [
            'model' => $model,

        ]);
    }


    public $enableCsrfValidation = false;

    public function actionInitiateStkPush()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $order_id = $request['order_id'] ?? null;
        $amount = $request['amount'] ?? null;
        $phone_number = $request['phone'] ?? null;
        // $callbackUrl = 'https://ee73-41-90-179-221.ngrok-free.app/site/callback'; // Replace with your callback URL
        $callbackUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/site/callback';


        if (!$amount || !$phone_number) {
            return ['success' => false, 'message' => 'Amount and phone number are required.'];
        }

        return Payment::initiateStkPush($amount, $phone_number, $callbackUrl, $order_id);
    }

    // public function actionCallback()
    // {
    //     Yii::$app->response->format = Response::FORMAT_JSON;
    //     $callbackData = file_get_contents('php://input');
    //     $callbackData = json_decode($callbackData, true);

    //     if (json_last_error() !== JSON_ERROR_NONE) {
    //         return ['success' => false, 'message' => 'Invalid JSON format'];
    //     }

    //     return Payment::handleCallback($callbackData);
    // }

    public function actionCallback()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $callbackData = file_get_contents('php://input');
        $callbackData = json_decode($callbackData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['success' => false, 'message' => 'Invalid JSON format'];
        }

        // Assuming `handleCallback` returns the payment model after processing
        $payment = Payment::handleCallback($callbackData);

        if (!$payment) {
            return ['success' => false, 'message' => 'Callback handling failed'];
        }

        // Check if the payment status is "Success" and update the order status
        if ($payment['success'] === true) {
            $order = Order::findOne(['id' => $payment['order_id']]);
            if ($order) {
                $order->status = 'Processing'; // Update order status to Processing
                if ($order->save(false)) {
                    return [
                        'success' => true,
                        'message' => 'Payment and order status updated successfully',
                    ];
                } else {
                    Yii::error("Order update failed: " . json_encode($order->errors));
                    return [
                        'success' => false,
                        'message' => 'Order status update failed' . json_encode($order->errors),
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Order not found for the payment reference',
                ];
            }
        }

        return [
            'success' => true,
            'message' => 'Callback processed without order status update',
        ];
    }


    public function actionGetStatus()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $external_reference = Yii::$app->request->get('external_reference');

        if (empty($external_reference)) {
            return ['success' => false, 'message' => 'External reference is required.'];
        }

        $payment = Payment::getStatus($external_reference);
        if ($payment) {
            return ['success' => true, 'payment' => $payment];
        }

        return ['success' => false, 'message' => 'Payment not found.'];
    }
}
