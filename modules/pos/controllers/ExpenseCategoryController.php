<?php

namespace app\modules\pos\controllers;

use app\components\IdGenerator;
use app\models\ExpenseCategory;
use app\modules\pos\models\ExpenseCategorySearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpenseCategoryController implements the CRUD actions for ExpenseCategory model.
 */
class ExpenseCategoryController extends Controller
{
    public $layout = 'PosLayout';


    /**
     * @inheritDoc
     */
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
     * Lists all ExpenseCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('ExpenseCategory-view')) {

            $searchModel = new ExpenseCategorySearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            $this->layout = '@app/views/layouts/LoginLayout';
            return $this->render('@app/views/layouts/error-403');
        }
    }

    /**
     * Displays a single ExpenseCategory model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('ExpenseCategory-view')) {

            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            $this->layout = '@app/views/layouts/LoginLayout';
            return $this->render('@app/views/layouts/error-403');
        }
    }

    /**
     * Creates a new ExpenseCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('ExpenseCategory-create')) {

            $model = new ExpenseCategory();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $model->id = IdGenerator::generateUniqueId();
                    $model->company_id = Yii::$app->user->identity->company_id;

                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Expense-Category created successfully.');

                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        // Capture model errors and set a flash message
                        $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                        Yii::$app->session->setFlash('error', 'Failed to save the Expense-Category. Errors: <br>' . $errors);
                    }
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            $this->layout = '@app/views/layouts/LoginLayout';
            return $this->render('@app/views/layouts/error-403');
        }
    }

    /**
     * Updates an existing ExpenseCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('ExpenseCategory-update')) {

            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            $this->layout = '@app/views/layouts/LoginLayout';
            return $this->render('@app/views/layouts/error-403');
        }
    }

    /**
     * Deletes an existing ExpenseCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('ExpenseCategory-delete')) {

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            $this->layout = '@app/views/layouts/LoginLayout';
            return $this->render('@app/views/layouts/error-403');
        }
    }

    /**
     * Finds the ExpenseCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return ExpenseCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExpenseCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
