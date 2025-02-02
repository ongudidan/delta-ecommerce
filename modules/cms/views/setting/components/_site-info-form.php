<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="title-header option-title">
                <h5>Site Info</h5>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'siteInfo-form',
                'options' => [
                    'class' => 'theme-form theme-form-2 mega-form',
                    'enctype' => 'multipart/form-data',
                ],
            ]); ?>

            <div class="row">
                <div class="mb-4 row align-items-center">
                    <?= Html::label('Site Title', 'banner_title', ['class' => 'form-label-title']) ?>
                    <div class="col-sm-12">
                        <?= $form->field($siteInfo, 'site_title', [
                            'options' => ['tag' => false],
                        ])->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Site Title',
                        ])->label(false) ?>
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <?= Html::label('Site Description', 'description', ['class' => 'form-label-title']) ?>
                    <div class="col-sm-12">
                        <?= $form->field($siteInfo, 'description', [
                            'options' => ['tag' => false],
                        ])->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Site Description',
                        ])->label(false) ?>
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <?= Html::label('Logo', 'logo', ['class' => 'form-label-title']) ?>
                    <div class="col-sm-12">
                        <?= $form->field($siteInfo, 'logoFile')->fileInput([
                            'id' => 'logo-input',
                            'maxlength' => true,
                        ])->label(false) ?>

                        <div class="row mt-3">
                            <div class="col-12 text-start">
                                <div class="image-preview">
                                    <img
                                        id="logo-preview2"
                                        src="<?= $siteInfo->logo ? Yii::getAlias('/web/uploads/') . $siteInfo->logo : '' ?>"
                                        alt="logo Preview"
                                        class="img-thumbnail"
                                        style="max-width: 150px; max-height: 150px; <?= $siteInfo->logo ? '' : 'display: none;' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 row align-items-center">
                    <?= Html::label('Favicon', 'video', ['class' => 'form-label-title']) ?>
                    <div class="col-sm-12">
                        <?= $form->field($siteInfo, 'faviconFile')->fileInput([
                            'id' => 'favicon-input',
                            'maxlength' => true,
                        ])->label(false) ?>

                        <div class="row mt-3">
                            <div class="col-12 text-start">
                                <div class="image-preview">
                                    <img
                                        id="favicon-preview2"
                                        src="<?= $siteInfo->favicon ? Yii::getAlias('/web/uploads/') . $siteInfo->favicon : '' ?>"
                                        alt="favicon Preview"
                                        class="img-thumbnail"
                                        style="max-width: 150px; max-height: 150px; <?= $siteInfo->favicon ? '' : 'display: none;' ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center justify-content-end flex-wrap d-flex">
                <?= Html::submitButton('Submit', [
                    'class' => 'btn btn-primary',
                    'form' => 'siteInfo-form', // Links the button to the form by its ID
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$this->registerJs(<<<JS
    document.getElementById('logo-input').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('logo-preview2');
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

<?php
$this->registerJs(<<<JS
    document.getElementById('favicon-input').addEventListener('change', function(event) {
        const input = event.target;
        const preview = document.getElementById('favicon-preview2');
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