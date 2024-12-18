<?php

namespace app\modules\cms\controllers;

use app\components\IdGenerator;
use app\models\ProductSubCategory;
use app\modules\cms\models\ProductSubCategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductSubCategoryController implements the CRUD actions for ProductSubCategory model.
 */
class ProductSubCategoryController extends Controller
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
     * Lists all ProductSubCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSubCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductSubCategory model.
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
     * Creates a new ProductSubCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProductSubCategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->file = UploadedFile::getInstance($model, 'file');
                // Set up the uploads directory
                $uploadsDir = Yii::getAlias('@webroot/web/uploads');
                if (!is_dir($uploadsDir)) {
                    if (!mkdir($uploadsDir, 0777, true) && !is_dir($uploadsDir)) {
                        Yii::$app->session->setFlash('error', 'Failed to create uploads directory.');
                        return $this->render('create', ['model' => $model]);
                    }
                }

                // Handle thumbnail file upload
                if ($model->file) {
                    $thumbnailName = uniqid('thumbnail_') . '.' . $model->file->extension;
                    $thumbnailPath = $uploadsDir . '/' . $thumbnailName;

                    if ($model->file->saveAs($thumbnailPath)) {
                        $model->thumbnail = $thumbnailName; // Save relative path
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to upload thumbnail file.');
                        Yii::error('thumbnail file upload failed for path: ' . $thumbnailPath);
                    }
                }

                $model->id = IdGenerator::generateUniqueId();
                $model->company_id = Yii::$app->user->identity->company_id;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Sub Category created successfully.');

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    // Capture model errors and set a flash message
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to save the Sub Category. Errors: <br>' . $errors);
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
     * Updates an existing ProductSubCategory model.
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
                    $oldthumbnailPath = $uploadsDir . '/' . $model->thumbnail;
                    if (file_exists($oldthumbnailPath) && !unlink($oldthumbnailPath)) {
                        Yii::$app->session->setFlash('error', 'Failed to delete the old file.');
                        Yii::error('Failed to delete old file: ' . $oldthumbnailPath);
                    }
                }

                // Save the new file
                $newthumbnailName = uniqid('photo_') . '.' . $model->file->extension;
                $newthumbnailPath = $uploadsDir . '/' . $newthumbnailName;

                if ($model->file->saveAs($newthumbnailPath)) {
                    $model->thumbnail = $newthumbnailName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to upload the new file.');
                    Yii::error('New file upload failed for path: ' . $newthumbnailPath);
                }
            }

            // Save the model
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Sub-categorysuccessfully.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // Log and show model errors
                $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                Yii::$app->session->setFlash('error', 'Failed to update the Sub-category <br>' . $errors);
                Yii::error('Model save failed: ' . $errors);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductSubCategory model.
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

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductSubCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return ProductSubCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductSubCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
