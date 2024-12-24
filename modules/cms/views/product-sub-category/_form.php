<?php

use app\models\ProductCategory;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSubCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>




<?php $form = ActiveForm::begin(); ?>

<div class="page-body theme-form theme-form-2 mega-form">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2">
                                    <h5>Create Product-Sub-Category</h5>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Product Category</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'product_category_id', [
                                            'template' => '{input}{error}', // Removes the label and surrounding divs added by default
                                        ])->widget(Select2::classname(), [
                                            'data' => ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),
                                            'language' => 'en',
                                            'options' => [
                                                'placeholder' => 'Select Product Category ...',
                                                // 'id' => 'product-category',
                                                'class' => 'js-example-basic-single w-100', // Maintains the custom class styling
                                            ],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ]) ?>
                                    </div>
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
                                    <label class="col-sm-3 form-label-title">thumbnail</label>
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
                                                        src="<?= $model->thumbnail ? Yii::getAlias('/web/uploads/') . $model->thumbnail : '' ?>"
                                                        alt="Image Preview"
                                                        class="img-thumbnail"
                                                        style="max-width: 150px; max-height: 150px; <?= $model->thumbnail ? '' : 'display: none;' ?>">
                                                </div>
                                            </div>
                                        </div>
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