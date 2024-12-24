<?php

namespace app\modules\cms\controllers;

use app\components\IdGenerator;
use app\models\Brand;
use app\modules\cms\models\BrandSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
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
     * Lists all Brand models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brand model.
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
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Brand();

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

                // Handle logo file upload
                if ($model->file) {
                    $logoName = uniqid('logo_') . '.' . $model->file->extension;
                    $logoPath = $uploadsDir . '/' . $logoName;

                    if ($model->file->saveAs($logoPath)) {
                        $model->logo = $logoName; // Save relative path
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to upload logo file.');
                        Yii::error('logo file upload failed for path: ' . $logoPath);
                    }
                }

                $model->id = IdGenerator::generateUniqueId();
                $model->company_id = Yii::$app->user->identity->company_id;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Brand created successfully.');

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    // Capture model errors and set a flash message
                    $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                    Yii::$app->session->setFlash('error', 'Failed to save the Brand. Errors: <br>' . $errors);
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
     * Updates an existing Brand model.
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
                if ($model->logo) {
                    $oldLogoPath = $uploadsDir . '/' . $model->logo;
                    if (file_exists($oldLogoPath) && !unlink($oldLogoPath)) {
                        Yii::$app->session->setFlash('error', 'Failed to delete the old file.');
                        Yii::error('Failed to delete old file: ' . $oldLogoPath);
                    }
                }

                // Save the new file
                $newLogoName = uniqid('photo_') . '.' . $model->file->extension;
                $newLogoPath = $uploadsDir . '/' . $newLogoName;

                if ($model->file->saveAs($newLogoPath)) {
                    $model->logo = $newLogoName;
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to upload the new file.');
                    Yii::error('New file upload failed for path: ' . $newLogoPath);
                }
            }

            // Save the model
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Brand updated successfully.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // Log and show model errors
                $errors = implode('<br>', \yii\helpers\ArrayHelper::getColumn($model->getErrors(), 0));
                Yii::$app->session->setFlash('error', 'Failed to update the Brand. Errors: <br>' . $errors);
                Yii::error('Model save failed: ' . $errors);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // Check if a logo exists and delete it
        if ($model->logo) {
            $uploadsDir = Yii::getAlias('@webroot/web/uploads');
            $filePath = $uploadsDir . '/' . $model->logo;
            if (file_exists($filePath)) {
                unlink($filePath); // Delete the file
            }
        }

        $model->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
