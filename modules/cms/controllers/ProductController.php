<?php

namespace app\modules\cms\controllers;

use app\components\IdGenerator;
use app\models\Product;
use app\modules\cms\models\ProductSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public $layout = 'CmsLayout';

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
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model = $this->uploadFile($model, 'file', 'thumbnail');


                // $model->file = UploadedFile::getInstance($model, 'file');
                // // Set up the uploads directory
                // $uploadsDir = Yii::getAlias('@webroot/web/uploads');
                // if (!is_dir($uploadsDir)) {
                //     if (!mkdir($uploadsDir, 0777, true) && !is_dir($uploadsDir)) {
                //         Yii::$app->session->setFlash('error', 'Failed to create uploads directory.');
                //         return $this->render('create', ['model' => $model]);
                //     }
                // }

                // // Handle thumbnail file upload
                // if ($model->file) {
                //     $thumbnailName = uniqid('thumbnail_') . '.' . $model->file->extension;
                //     $thumbnailPath = $uploadsDir . '/' . $thumbnailName;

                //     if ($model->file->saveAs($thumbnailPath)) {
                //         $model->thumbnail = $thumbnailName; // Save relative path
                //     } else {
                //         Yii::$app->session->setFlash('error', 'Failed to upload thumbnail file.');
                //         Yii::error('thumbnail file upload failed for path: ' . $thumbnailPath);
                //     }
                // }

                $model->id = IdGenerator::generateUniqueId();
                $model->company_id = Yii::$app->user->identity->company_id;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Product created successfully.');

                    return $this->redirect(['index', 'id' => $model->id]);
                } else {
                    // Capture model errors and set a flash message
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to save the Product. Errors: <br>' . $errors);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $uploadsDir = Yii::getAlias('@webroot/web/uploads');

                // Handle file upload and deletion of old file
                if ($model->file) {
                    // Delete the old file if it exists
                    if ($model->thumbnail) {
                        $oldThumbnailPath = $uploadsDir . '/' . $model->thumbnail;
                        if (file_exists($oldThumbnailPath) && !unlink($oldThumbnailPath)) {
                            Yii::$app->session->setFlash('error', 'Failed to delete the old file.');
                            Yii::error('Failed to delete old file: ' . $oldThumbnailPath);
                        }
                    }

                    // Save the new file
                    $newThumbnailName = uniqid('photo_') . '.' . $model->file->extension;
                    $newThumbnailPath = $uploadsDir . '/' . $newThumbnailName;

                    if ($model->file->saveAs($newThumbnailPath)) {
                        $model->thumbnail = $newThumbnailName;
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to upload the new file.');
                        Yii::error('New file upload failed for path: ' . $newThumbnailPath);
                    }
                }

                // Save the model
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Product updated successfully.');
                    return $this->redirect(['index', 'id' => $model->id]);
                } else {
                    // Log and show model errors
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to update the Product. Errors: <br>' . $errors);
                    Yii::error('Model save failed: ' . $errors);
                }
            }
            return $this->render('update', [
                'model' => $model,
            ]);
            
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Check if a thumbnail exists and delete it
        if ($model->thumbnail) {
            $uploadsDir = Yii::getAlias('@webroot/web/uploads');
            $filePath = $uploadsDir . '/' . $model->thumbnail;
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file
            }
        }

        $model->delete();
        Yii::$app->session->setFlash('success', 'Product deleted successfully.');

        return $this->redirect(['index']);
    }


    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /////////////////////////////////////////////////
    public function uploadFile($model, $formAtribute, $attribute)
    {
        $uploadedFile = UploadedFile::getInstance($model, $formAtribute);
        $uploadsDir = Yii::getAlias('@webroot/web/uploads');


        if ($uploadedFile) {
            $oldFilePath = $uploadsDir . '/' . $model->$attribute;
            $newFileName = uniqid() . '.' . $uploadedFile->extension;
            $newFilePath = $uploadsDir . '/' . $newFileName;

            // Delete old file if it exists
            if (file_exists($oldFilePath)) {
                @unlink($oldFilePath);
            }

            if ($uploadedFile->saveAs($newFilePath)) {
                $model->$attribute = $newFileName;
            }
        }
        return $model;
    }
}
