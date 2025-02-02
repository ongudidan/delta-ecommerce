<?php

namespace app\controllers;

use app\components\IdGenerator;
use app\models\Order;
use app\models\OrderItem;
use app\models\User;
use app\models\UserAddress;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class UserDashboardController extends \yii\web\Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'orders', 'profile', 'security', 'address', 'privacy', 'create-address', 'delete-address', 'password', 'email', 'phone'],
                    'rules' => [
                        [
                            'actions' => ['index', 'orders', 'profile', 'security', 'address', 'privacy', 'create-address', 'delete-address', 'password', 'email', 'phone'],
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
        $userId = Yii::$app->user->id;

        // Count the total orders for the logged-in user
        $totalOrdersCount = Order::find()->where(['user_id' => $userId])->count();

        // Count orders for each status
        $completedCount = Order::find()->where(['user_id' => $userId, 'status' => 'completed'])->count();
        $pendingCount = Order::find()->where(['user_id' => $userId, 'status' => 'pending'])->count();
        $cancelledCount = Order::find()->where(['user_id' => $userId, 'status' => 'cancelled'])->count();

        // Render the data to the view
        return $this->render('index', [
            'totalOrdersCount' => $totalOrdersCount,
            'completedCount' => $completedCount,
            'pendingCount' => $pendingCount,
            'cancelledCount' => $cancelledCount,
        ]);
    }



    public function actionOrders()
    {
        $userId = Yii::$app->user->id; // Get the currently logged-in user's ID

        $orderItems = OrderItem::find()
        ->joinWith('order') // Assuming 'order' is the relation name in the OrderItem model
        ->where(['order.user_id' => $userId])
        ->orderBy(['created_at' => SORT_DESC]) // Specify the sort direction
        ->all();

        return $this->render('index', [
            'orderItems' => $orderItems,
        ]);
    }

    // public function actionPassword()
    // {
    //     return $this->render('index');
    // }

    public function actionPassword()
    {
        $user = User::findOne(Yii::$app->user->id); // Fetch the currently logged-in user

        if (!$user) {
            throw new NotFoundHttpException('User not found.');
        }

        $model = $user; // Reuse the User model for the form

        // Define custom attributes for password fields
        $model->scenario = 'changePassword';
        $model->oldPassword = '';
        $model->newPassword = '';
        $model->confirmNewPassword = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Verify the old password
            if (!Yii::$app->security->validatePassword($model->oldPassword, $user->password_hash)) {
                $model->addError('oldPassword', 'The old password is incorrect.');
            } else {
                // Update the password
                $user->password_hash = Yii::$app->security->generatePasswordHash($model->newPassword);

                if ($user->save()) {
                    Yii::$app->session->setFlash('success', 'Password changed successfully.');
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to change password. Please try again.');
                }
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    // public function actionEmail()
    // {
    //     return $this->render('index');
    // }

    public function actionEmail()
    {
        $user = User::findOne(Yii::$app->user->id); // Fetch the currently logged-in user

        if (!$user) {
            throw new NotFoundHttpException('User not found.');
        }

        // Set the scenario for updating the email
        $user->scenario = 'updateEmail';

        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Email address updated successfully.');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Failed to update email address. Please try again.');
            }
        }

        return $this->render('index', [
            'model' => $user,
        ]);
    }

    // public function actionPhone()
    // {
    //     return $this->render('index');
    // }

    public function actionPhone()
    {
        $user = User::findOne(Yii::$app->user->id); // Fetch the currently logged-in user

        if (!$user) {
            throw new NotFoundHttpException('User not found.');
        }

        // Set the phone number as a required field for this operation
        $user->scenario = 'updatePhone';

        if ($user->load(Yii::$app->request->post()) && $user->validate()) {
            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Phone number updated successfully.');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Failed to update phone number. Please try again.');
            }
        }

        return $this->render('index', [
            'model' => $user,
        ]);
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
