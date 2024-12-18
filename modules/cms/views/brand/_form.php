<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Brand $model */
/** @var yii\widgets\ActiveForm $form */
?>


<?php $form = ActiveForm::begin(); ?>

<div class="page-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Create Brand</h5>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Name</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'name', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Description</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'description', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">logo</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'file')->fileInput([
                                            'id' => 'file-input',
                                            'maxlength' => true,
                                        ])->label(false) ?>

                                        <div class="row mt-3">
                                            <div class="col-12 text-start">
                                                <div class="image-preview">
                                                    <img
                                                        id="image-preview"
                                                        src="<?= $model->logo ? Yii::getAlias('/web/uploads/') . $model->logo : '' ?>"
                                                        alt="Image Preview"
                                                        class="img-thumbnail"
                                                        style="max-width: 150px; max-height: 150px; <?= $model->logo ? '' : 'display: none;' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Status</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'status', ['template' => '{input}{error}'])->dropDownList(
                                            [
                                                10 => 'Active', // Value 10 for active status
                                                9 => 'Inactive', // Value 0 for inactive status
                                            ],
                                            ['prompt' => 'Select Status'] // Optional: Add a prompt
                                        ) ?>
                                    </div>
                                </div>

                                <?= Html::submitButton('Save', ['class' => 'btn btn-primary ms-auto mt-4']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<?php
$this->registerJs(<<<JS
    document.getElementById('file-input').addEventListener('change', function(event) {
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