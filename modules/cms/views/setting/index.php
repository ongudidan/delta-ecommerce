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
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>General Settings</h5>
                                </div>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'general-settings-form',
                                    'options' => [
                                        'class' => 'theme-form theme-form-2 mega-form',
                                        'enctype' => 'multipart/form-data'
                                    ],
                                ]); ?>

                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <?= Html::label('Phone Number', 'phone', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'phone', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Phone Number'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Address', 'address', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'address', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Address'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Twitter', 'twitter', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'twitter', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Twitter Username'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Instagram', 'instagram', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'instagram', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Instagram Username'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Footer Title', 'footer_title', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'footer_title', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Footer Title'])
                                                ->label(false) ?>
                                        </div>
                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <?= Html::label('Email', 'email', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'email', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Email'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Facebook', 'facebook', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'facebook', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business Facebook Username'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('YouTube', 'youtube', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'youtube', ['options' => ['tag' => false]])
                                                ->textInput(['class' => 'form-control', 'placeholder' => 'Business YouTube Username'])
                                                ->label(false) ?>
                                        </div>
                                        <div class="mb-4">
                                            <?= Html::label('Footer Description', 'description', ['class' => 'form-label-title']) ?>
                                            <?= $form->field($model, 'description', ['options' => ['tag' => false]])
                                                ->textarea(['class' => 'form-control', 'placeholder' => 'Site Footer Description'])
                                                ->label(false) ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center justify-content-end flex-wrap d-flex">
                                    <?= Html::submitButton('Submit', [
                                        'class' => 'btn btn-primary',
                                        'form' => 'general-settings-form', // Links the button to the form by its ID
                                    ]) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>

                        <!-- Details End -->

                        <div class="row">
                            <!-- main banner form start -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-header option-title">
                                            <h5>Main Banner</h5>
                                        </div>
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'main-banner-form',
                                            'options' => [
                                                'class' => 'theme-form theme-form-2 mega-form',
                                                'enctype' => 'multipart/form-data',
                                            ],
                                        ]); ?>

                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Title', 'banner_title', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($mainBanner, 'title', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Title',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Description', 'description', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($mainBanner, 'description', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Description',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Offer Percentage', 'offer_percentage', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($mainBanner, 'offer_percentage', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Offer Percentage',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Product Link', 'product_link', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($mainBanner, 'product_link', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'https://example.com',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner video', 'video', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($mainBanner, 'videoFile')->fileInput([
                                                        'id' => 'file-input',
                                                        'class' => 'form-control',

                                                        'maxlength' => true,
                                                    ])->label(false) ?>

                                                    <div class="row mt-3">
                                                        <div class="col-12 text-start">
                                                            <div class="video-preview">
                                                                <video
                                                                    id="video-preview"
                                                                    class="img-thumbnail"
                                                                    style="max-width: 300px; max-height: 200px; display: none;"
                                                                    controls>
                                                                    <source src="<?= $mainBanner->video ? Yii::getAlias('/web/uploads/') . $mainBanner->video : '' ?>" type="video/mp4">
                                                                </video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center justify-content-end flex-wrap d-flex">
                                            <?= Html::submitButton('Submit', [
                                                'class' => 'btn btn-primary',
                                                'form' => 'main-banner-form', // Links the button to the form by its ID
                                            ]) ?>
                                        </div>

                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- main banner form end -->

                            <!-- banner1 form start -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-header option-title">
                                            <h5>First Banner</h5>
                                        </div>
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'banner1-form',
                                            'options' => [
                                                'class' => 'theme-form theme-form-2 mega-form',
                                                'enctype' => 'multipart/form-data',
                                            ],
                                        ]); ?>

                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Title', 'banner_title', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner1, 'title', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Title',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Description', 'description', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner1, 'description', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Description',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Offer Percentage', 'offer_percentage', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner1, 'offer_percentage', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Offer Percentage',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Product Link', 'product_link', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner1, 'product_link', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'https://example.com',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner1 Image', 'image', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner1, 'imageFile')->fileInput([
                                                        'id' => 'banner1-input',
                                                        'maxlength' => true,
                                                    ])->label(false) ?>

                                                    <div class="row mt-3">
                                                        <div class="col-12 text-start">
                                                            <div class="image-preview">
                                                                <img
                                                                    id="image-preview"
                                                                    src="<?= $banner1->image ? Yii::getAlias('/web/uploads/') . $banner1->image : '' ?>"
                                                                    alt="Image Preview"
                                                                    class="img-thumbnail"
                                                                    style="max-width: 150px; max-height: 150px; <?= $banner1->image ? '' : 'display: none;' ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center justify-content-end flex-wrap d-flex">
                                            <?= Html::submitButton('Submit', [
                                                'class' => 'btn btn-primary',
                                                'form' => 'banner1-form', // Links the button to the form by its ID
                                            ]) ?>
                                        </div>

                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- banner1 banner form end -->

                            <!-- banner2 form start -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="title-header option-title">
                                            <h5>Second Banner</h5>
                                        </div>
                                        <?php $form = ActiveForm::begin([
                                            'id' => 'banner2-form',
                                            'options' => [
                                                'class' => 'theme-form theme-form-2 mega-form',
                                                'enctype' => 'multipart/form-data',
                                            ],
                                        ]); ?>

                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Title', 'banner_title', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner2, 'title', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Title',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner Description', 'description', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner2, 'description', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Banner Description',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Offer Percentage', 'offer_percentage', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner2, 'offer_percentage', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Offer Percentage',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Product Link', 'product_link', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner2, 'product_link', [
                                                        'options' => ['tag' => false],
                                                    ])->textInput([
                                                        'class' => 'form-control',
                                                        'placeholder' => 'https://example.com',
                                                    ])->label(false) ?>
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <?= Html::label('Banner2 Image', 'video', ['class' => 'form-label-title']) ?>
                                                <div class="col-sm-12">
                                                    <?= $form->field($banner2, 'imageFile')->fileInput([
                                                        'id' => 'banner2-input',
                                                        'maxlength' => true,
                                                    ])->label(false) ?>

                                                    <div class="row mt-3">
                                                        <div class="col-12 text-start">
                                                            <div class="image-preview">
                                                                <img
                                                                    id="image-preview2"
                                                                    src="<?= $banner2->image ? Yii::getAlias('/web/uploads/') . $banner2->image : '' ?>"
                                                                    alt="Image Preview"
                                                                    class="img-thumbnail"
                                                                    style="max-width: 150px; max-height: 150px; <?= $banner2->image ? '' : 'display: none;' ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center justify-content-end flex-wrap d-flex">
                                            <?= Html::submitButton('Submit', [
                                                'class' => 'btn btn-primary',
                                                'form' => 'banner2-form', // Links the button to the form by its ID
                                            ]) ?>
                                        </div>

                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- banner2 banner form end -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings Section End -->



<?php
$this->registerJs(<<<JS
    document.getElementById('file-input').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('video-preview');
        const file = input.files[0];
        
        if (file && file.type.startsWith('video/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const source = preview.querySelector('source');
                source.src = e.target.result; // Set the video source to the uploaded file
                preview.load(); // Reload the video with the new source
                preview.style.display = 'block'; // Ensure the video element is visible
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            const source = preview.querySelector('source');
            source.src = ''; // Clear the video source
            preview.style.display = 'none'; // Hide the video element
        }
    });
JS);
?>




<!-- for image  -->
<?php
$this->registerJs(<<<JS
    document.getElementById('banner1-input').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Update the image source
                preview.style.display = 'block'; // Ensure the image is visible
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src = ''; // Clear the image source if no file is selected
            preview.style.display = 'none'; // Hide the image
        }
    });
JS);

?>

<!-- for image  -->
<?php
$this->registerJs(<<<JS
    document.getElementById('banner2-input').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview2');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result; // Update the image source
                preview.style.display = 'block'; // Ensure the image is visible
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src = ''; // Clear the image source if no file is selected
            preview.style.display = 'none'; // Hide the image
        }
    });
JS);

?>