<?php

namespace app\modules\cms\controllers;

use app\models\Banner1;
use app\models\Banner2;
use app\models\ContactInfo;
use app\models\MainBanner;
use Yii;
use yii\web\UploadedFile;

class SettingController extends \yii\web\Controller
{
    public $layout = 'CmsLayout';

    // public function actionIndex()
    // {
    //     $mainBanner = MainBanner::find()->one() ?? new MainBanner();
    //     $banner1 = Banner1::find()->one() ?? new Banner1();
    //     $banner2 = Banner2::find()->one() ?? new Banner2();
    //     $uploadsDir = Yii::getAlias('@webroot/web/uploads');

    //     // main banner
    //     if ($mainBanner->load(Yii::$app->request->post())) {

    //         if (Yii::$app->request->isPost) {
    //             $mainBanner->load(Yii::$app->request->post());

    //             // Handle video upload  if a file is uploaded   
    //             $uploadedFile = UploadedFile::getInstance($mainBanner, 'videoFile'); // Replace `image_attribute` with your actual attribute name
    //             // var_dump($uploadedFile);
    //             // exit;

    //             if ($uploadedFile) {
    //                 $oldFilePath = $uploadsDir . '/' . $mainBanner->video; // Assuming `video` holds the file path
    //                 $newFileName = uniqid() . '.' . $uploadedFile->extension;
    //                 $newFilePath = $uploadsDir . '/' . $newFileName;

    //                 print_r($newFilePath);

    //                 // var_dump(file_exists($oldFilePath));
    //                 // exit;
    //                 // Delete old file if it exists
    //                 if (file_exists($oldFilePath && $mainBanner->video)) {
    //                     unlink($oldFilePath);
    //                 }

    //                 if ($uploadedFile->saveAs($newFilePath)) {
    //                     $mainBanner->video = $newFileName;
    //                 }
    //             }

    //             if ($mainBanner->save()) {
    //                 Yii::$app->session->setFlash('success', 'Main Banner saved successfully.');
    //                 return $this->refresh();
    //             }
    //         }
    //     }

    //     // banner 1
    //     if ($banner1->load(Yii::$app->request->post())) {

    //         if (Yii::$app->request->isPost) {
    //             $banner1->load(Yii::$app->request->post());

    //             // Handle image upload  if a file is uploaded   
    //             $uploadedFile = UploadedFile::getInstance($banner1, 'imageFile'); // Replace `image_attribute` with your actual attribute name

    //             if ($uploadedFile) {
    //                 $oldFilePath = $uploadsDir . '/' . $banner1->image; // Assuming `image` holds the file path
    //                 $newFileName = uniqid() . '.' . $uploadedFile->extension;
    //                 $newFilePath = $uploadsDir . '/' . $newFileName;

    //                 // var_dump(file_exists($oldFilePath));
    //                 // exit;
    //                 // Delete old file if it exists
    //                 if (file_exists($oldFilePath)) {
    //                     unlink($oldFilePath);
    //                 }

    //                 if ($uploadedFile->saveAs($newFilePath)) {
    //                     $banner1->image = $newFileName;
    //                 }
    //             }

    //             if ($banner1->save()) {
    //                 Yii::$app->session->setFlash('success', 'Banner 1 saved successfully.');
    //                 return $this->refresh();
    //             }
    //         }
    //     }

    //     // banner 2
    //     if ($banner2->load(Yii::$app->request->post())) {

    //         if (Yii::$app->request->isPost) {
    //             $banner2->load(Yii::$app->request->post());

    //             // Handle image upload  if a file is uploaded
    //             $uploadedFile = UploadedFile::getInstance($banner2, 'imageFile'); // Replace `image_attribute` with your actual attribute name
    //             // print_r($uploadedFile);
    //             // exit;

    //             if ($uploadedFile) {
    //                 $oldFilePath = $uploadsDir . '/' . $banner2->image; // Assuming `image_path` holds the file path
    //                 $newFileName = uniqid() . '.' . $uploadedFile->extension;
    //                 $newFilePath = $uploadsDir . '/' . $newFileName;

    //                 if ($banner2->isNewRecord || !empty($oldFilePath)) {
    //                     // Delete old file if it exists
    //                     if (file_exists($oldFilePath)) {
    //                         @unlink($oldFilePath);
    //                     }
    //                 }

    //                 if ($uploadedFile->saveAs($newFilePath)) {
    //                     $banner2->image = $newFileName;
    //                 }
    //             }

    //             if ($banner2->save()) {
    //                 Yii::$app->session->setFlash('success', 'Banner 2 saved successfully.');
    //                 return $this->refresh();
    //             }
    //         }
    //     }


    //     // Fetch the first record or create a new one if none exists
    //     $model = ContactInfo::find()->one() ?? new ContactInfo();

    //     // Handle form submission
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         Yii::$app->session->setFlash('success', 'Contact information saved successfully.');
    //         return $this->refresh(); // Reload the page to prevent duplicate submissions
    //     }

    //     // Render the form with the model
    //     return $this->render('index', [
    //         'model' => $model,
    //         'mainBanner' => $mainBanner,
    //         'banner1' => $banner1,
    //         'banner2' => $banner2,
    //     ]);
    // }

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

    public function actionIndex()
    {
        $mainBanner = MainBanner::find()->one() ?? new MainBanner();
        $banner1 = Banner1::find()->one() ?? new Banner1();
        $banner2 = Banner2::find()->one() ?? new Banner2();

        // Handle main banner upload
        if ($mainBanner->load(Yii::$app->request->post())) {
            //used to pass model, file input attribute in the form, directory path and the attribute name in the model to save in the database
            $mainBanner = $this->uploadFile($mainBanner, 'videoFile', 'video');
            if ($mainBanner->save()) {
                Yii::$app->session->setFlash('success', 'Main Banner saved successfully.');
                return $this->refresh();
            }
        }

        // Handle banner1 upload
        if ($banner1->load(Yii::$app->request->post())) {
            $banner1 = $this->uploadFile($banner1, 'imageFile', 'image');
            if ($banner1->save()) {
                Yii::$app->session->setFlash('success', 'Banner 1 saved successfully.');
                return $this->refresh();
            }
        }

        // Handle banner2 upload
        if ($banner2->load(Yii::$app->request->post())) {
            $banner2 = $this->uploadFile($banner2, 'imageFile', 'image');
            if ($banner2->save()) {
                Yii::$app->session->setFlash('success', 'Banner 2 saved successfully.');
                return $this->refresh();
            }
        }

        // Fetch or create ContactInfo model
        $model = ContactInfo::find()->one() ?? new ContactInfo();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Contact information saved successfully.');
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
            'mainBanner' => $mainBanner,
            'banner1' => $banner1,
            'banner2' => $banner2,
        ]);
    }

}
