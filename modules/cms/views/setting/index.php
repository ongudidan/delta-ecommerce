<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
<!-- Settings Section Start -->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Details Start -->
                        <?= $this->render('components/_general-settings-form', [
                            'model' => $model,
                            // 'form' => $form,    
                        ]) ?>
                        <!-- Details End -->

                        <div class="row">
                            <!-- main banner form start -->
                            <?= $this->render('components/_main-banner-form', [
                                'mainBanner' => $mainBanner,
                            ]) ?>
                            <!-- main banner form end -->

                            <!-- banner1 form start -->
                            <?= $this->render('components/_first-banner-form', [
                                'banner1' => $banner1,
                            ]) ?>
                            <!-- banner1 banner form end -->

                            <!-- banner2 form start -->
                            <?= $this->render('components/_second-banner-form', [
                                'banner2' => $banner2,
                            ]) ?>
                            <!-- banner2 banner form end -->

                            <!-- siteInfo form start -->
                            <?= $this->render('components/_site-info-form', [
                                'siteInfo' => $siteInfo,
                            ]) ?>
                            <!-- siteInfo banner form end -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings Section End -->