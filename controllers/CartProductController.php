<?php

namespace app\controllers;

use app\models\CartProduct;
use app\models\CartProductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CartProductController implements the CRUD actions for CartProduct model.
 */
class CartProductController extends Controller
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
     * Lists all CartProduct models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CartProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CartProduct model.
     * @param string $id ID
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
     * Creates a new CartProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CartProduct();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CartProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
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
     * Deletes an existing CartProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CartProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return CartProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CartProduct::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionUpdateQuantity()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $cartId = Yii::$app->request->post('cart_id');
        $quantity = Yii::$app->request->post('quantity');

        if ($cartId && $quantity) {
            $cartItem = CartProduct::findOne($cartId);
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                if ($cartItem->save()) {
                    return ['success' => true, 'message' => 'Quantity updated successfully'];
                }
            }
        }

        return ['success' => false, 'message' => 'Failed to update quantity'];
    }


    public function actionRemoveProduct()
    {
        $cartId = Yii::$app->request->post('cart_id');


        $cartProduct = CartProduct::findOne($cartId);
        if ($cartProduct) {
            if ($cartProduct->delete()) {
                return json_encode([
                    'success' => true,
                    'message' => 'Product removed successfully!',
                    'redirect' => true
                ]);
            } else {
                return json_encode([
                    'success' => false,
                    'message' => 'Failed to remove product.',
                ]);
            }
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Product not found.',
            ]);
        }
    }


}
