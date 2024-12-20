<?php

namespace app\controllers;

use app\components\IdGenerator;
use app\models\UserAddress;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class UserDashboardController extends \yii\web\Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'orders', 'profile', 'security', 'address', 'privacy', 'create-address', 'delete-address'],
                    'rules' => [
                        [
                            'actions' => ['index', 'orders', 'profile', 'security', 'address', 'privacy', 'create-address', 'delete-address'],
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

    public $layout = 'FrontLayout';

    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOrders()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        return $this->render('index');
    }

    public function actionSecurity()
    {
        return $this->render('index');
    }

    public function actionAddress()
    {
        $addresses = UserAddress::find()->all();

        return $this->render('index',[
            'addresses' => $addresses,
        ]);
    }

    public function actionPrivacy()
    {
        return $this->render('index');
    }

    public function actionCreateAddress()
    {
        $model = new UserAddress();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->id = IdGenerator::generateUniqueId();
                $model->user_id = Yii::$app->user->id;
                // $model->company_id = Yii::$app->user->identity->company_id;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Address created successfully.');

                    return $this->redirect(['address', 'id' => $model->id]);
                } else {
                    // Capture model errors and set a flash message
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to save the Address. Errors: <br>' . $errors);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDeleteAddress($id)
    {
        // $this->findModel($id)->delete();
        
        UserAddress::findOne($id)->delete();
        Yii::$app->session->setFlash('success', 'Address deleted successfully.');


        return $this->redirect(['address']);
    }

}
