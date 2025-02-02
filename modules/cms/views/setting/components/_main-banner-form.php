<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
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
                                        style="max-width: 200px; max-height: 100px; "
                                        controls>
                                        <source src="<?= $mainBanner->video ? Yii::getAlias('/web/uploads/') . $mainBanner->video : '' ?>">
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