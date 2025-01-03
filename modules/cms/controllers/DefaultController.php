<?php

namespace app\modules\cms\controllers;

use app\models\Payment;
use app\models\Product;
use app\models\ProductCategory;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `cms` module
 */
class DefaultController extends Controller
{
    public $layout = 'CmsLayout';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['logout', 'update', 'delete', 'create', 'view', 'index'],
                    'rules' => [
                        [
                            'actions' => ['logout', 'update', 'delete', 'create', 'view', 'index'],
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
     * Renders the index view for the module
     * @return string
     */
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }
    public function actionIndex()
    {
        $bestSellers = Product::find()
            ->select(['product.*', 'COUNT(order_item.id) as order_count', 'SUM(order_item.quantity * product.selling_price) as total_amount'])
            ->leftJoin('order_item', 'order_item.product_id = product.id')
            ->groupBy('product.id')
            ->orderBy(['order_count' => SORT_DESC])
            ->limit(3)
            ->all();

        $categories = ProductCategory::find()->all();

        $transactions = Payment::find()
            ->select([ 'amount', 'mpesa_receipt_number', 'phone', 'status','created_at'])
            ->where(['status' => 'Success'])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('index', [
            'bestSellers' => $bestSellers,
            'categories' => $categories,
            'transactions' => $transactions,

        ]);
    }
}
