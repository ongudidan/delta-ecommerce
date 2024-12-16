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
use app\models\Product;
use app\models\ProductCategory;
use app\models\ProductSearch;
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
            'productCategories'=> $productCategories,
        ]);
    }


    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionProducts()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

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


}
