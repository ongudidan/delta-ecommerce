<?php

use app\models\Brand;
use app\models\ProductCategory;
use app\models\ProductSubCategory;
use app\models\Unit;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */

// Fetch the current subcategory for the model
$selectedSubCategory = ProductSubCategory::findOne($model->product_sub_category_id);

// Subcategory data: include only the current subcategory initially
$subCategoryData = $selectedSubCategory
    ? [$selectedSubCategory->id => $selectedSubCategory->name]
    : [];

?>


<?php
$formAction = Yii::$app->controller->action->id === 'update'
    ? ['product/update', 'id' => $model->id]
    : ['product/create']; // Use 'create' action if it's not update
?>

<?php $form = ActiveForm::begin([
    'id' => 'main-form',
    'enableAjaxValidation' => false, // Disable if you're not using AJAX
    'action' => $formAction, // Set action based on create or update
    'method' => 'post',
]); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card comman-shadow">
            <div class="card-body">

                <div class="row">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group local-forms">
                                <?= $form->field($model, 'product_category_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select Product Category ...', 'id' => 'product-category'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group local-forms">
                                <?= $form->field($model, 'product_sub_category_id')->widget(Select2::classname(), [
                                    'data' => $subCategoryData, // Prepopulate with the current subcategory
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select Product Sub-Category ...', 'id' => 'product-subcategory'],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]); ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group local-forms">
                                <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Brand::find()->all(), 'id', 'name'),
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select Product Category ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group local-forms">
                                <?= $form->field($model, 'unit_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Unit::find()->all(), 'id', 'name'),
                                    'language' => 'en',
                                    'options' => ['placeholder' => 'Select Product Category ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'selling_price')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'compare_price')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'product_number')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12">
                        <div class="form-group local-forms">
                            <label for="image-preview" class="form-label">Thumbnail</label>
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

                    <div class="col-12 col-sm-12">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12">
                        <div class="form-group local-forms">
                            <?= $form->field($model, 'specifications')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="student-submit d-flex justify-content-center">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'form' => 'main-form']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<?php
// JavaScript to handle dynamic subcategory updates
$this->registerJs(<<<JS
  $('#product-category').on('change', function() {
    const categoryId = $(this).val(); // Get selected category ID
    const subCategorySelect = $('#product-subcategory'); // Subcategory dropdown

    // Clear current subcategories
    subCategorySelect.empty().trigger('change');

    if (categoryId) {
        // Fetch subcategories via AJAX
        $.ajax({
            url: 'get-subcategories', // Adjust to match your URL
            type: 'GET',
            data: { categoryId: categoryId },
            success: function(data) {
                if (data.error) {
                    console.error('Error:', data.error);
                    return;
                }

                // Populate subcategories
                $.each(data, function(id, name) {
                    const option = new Option(name, id, false, false);
                    subCategorySelect.append(option).trigger('change');
                });
            },
            error: function() {
                console.error('Failed to fetch subcategories');
            }
        });
    }
});


JS);
?>


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