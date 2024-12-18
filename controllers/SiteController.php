<?php

namespace app\controllers;

use app\components\IdGenerator;
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
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductSearch;
use app\models\SignupForm;
use app\models\UserAddress;
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
        $productCategories = ProductCategory::find()->all();
        return $this->render('index', [
            'productCategories' => $productCategories,
        ]);
    }


    /**
     * Lists all Product models.
     *
     * @return string
     */
    // public function actionProducts($id)
    // {
    //     $searchModel = new ProductSearch();
    //     $dataProvider = $searchModel->search($this->request->queryParams);

    //     return $this->render('products', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }
    public function actionProducts($category_id = null)
    {
        $searchModel = new ProductSearch();
        $queryParams = $this->request->queryParams;

        // If category_id is set, filter by it
        if ($category_id !== null) {
            $queryParams['ProductSearch']['category_id'] = $category_id;
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
    // public function actionAdd()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    //     $productId = Yii::$app->request->post('product_id');
    //     $quantity = Yii::$app->request->post('quantity', 1);

    //     if (!$productId || $quantity <= 0) {
    //         return [
    //             'success' => false,
    //             'message' => 'Invalid product or quantity.',
    //         ];
    //     }

    //     $cart = new CartProduct(); // Replace with your cart model
    //     $cart->id = IdGenerator::generateUniqueId();

    //     $cart->product_id = $productId;
    //     $cart->quantity = $quantity;
    //     $cart->user_id = Yii::$app->user->id; // Assuming a logged-in user

    //     if ($cart->save()) {
    //         return [
    //             'success' => true,
    //             'message' => 'Product added to cart successfully!',
    //         ];
    //     }

    //     return [
    //         'success' => false,
    //         'message' => 'Failed to add product to cart. Please try again.',
    //     ];
    // }

    public function actionAdd()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $productId = Yii::$app->request->post('product_id');
        $quantity = Yii::$app->request->post('quantity', 1);

        if (!$productId || $quantity <= 0) {
            return [
                'success' => false,
                'message' => 'Invalid product or quantity.',
            ];
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
            return [
                'success' => true,
                'message' => 'Product added to cart successfully!',
            ];
        }

        return [
            'success' => false,
            'message' => 'Failed to add product to cart. Please try again.',
        ];
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


    public function actionCreateOrder()
    {
        $model = new Order();
        $addresses = UserAddress::find()->where(['user_id' => Yii::$app->user->id])->all();
        $cartProducts = CartProduct::find()->where(['user_id' => Yii::$app->user->id])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->id = IdGenerator::generateUniqueId();
                $address = UserAddress::find()->where(['user_id' => Yii::$app->user->id, 'id' => $model->address_id])->one();

                $model->address = $address->address;
                $model->user_id = Yii::$app->user->id;
                $model->phone_no = $address->phone_no;
                $model->first_name = $address->first_name;
                $model->last_name = $address->last_name;
                $model->status = 9;

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

                        Yii::$app->session->setFlash('success', 'Order created successfully.');
                        return $this->redirect(['order-success', 'id' => $model->id]);
                    }
                } else {
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to save the Order. Errors: <br>' . $errors);
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


    public function actionOrderSuccess($id)
    {
        $model = Order::findOne($id);

        return $this->render('order-success', [
            'model' => $model,

        ]);
    }
}
