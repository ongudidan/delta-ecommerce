 <?php

    use app\models\Brand;
    use app\models\ProductCategory;
    use app\models\ProductSubCategory;
    use app\models\Unit;
    use kartik\select2\Select2;
    use yii\helpers\ArrayHelper;

    // Fetch the current subcategory for the model
    $selectedSubCategory = ProductSubCategory::findOne($model->product_sub_category_id);

    // Subcategory data: include only the current subcategory initially
    $subCategoryData = $selectedSubCategory
        ? [$selectedSubCategory->id => $selectedSubCategory->name]
        : [];

    ?>
 <div class="card">
     <div class="card-body">
         <div class="card-header-2">
             <h5>Product Information</h5>
         </div>

         <form class="theme-form theme-form-2 mega-form">
             <div class="mb-4 row align-items-center">
                 <label class="form-label-title col-sm-3 mb-0">Product
                     Name</label>
                 <div class="col-sm-9">
                     <?= $form->field($model, 'name', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                 </div>
             </div>

             <div class="mb-4 row align-items-center">
                 <label class="col-sm-3 col-form-label form-label-title">Category</label>
                 <div class="col-sm-9">
                     <?= $form->field($model, 'product_category_id', [
                            'template' => '{input}{error}', // Removes the label and surrounding divs added by default
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(ProductCategory::find()->all(), 'id', 'name'),
                            'language' => 'en',
                            'options' => [
                                'placeholder' => 'Select Product Category ...',
                                'id' => 'product-category',
                                'class' => 'js-example-basic-single w-100', // Maintains the custom class styling
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]) ?>
                 </div>
             </div>
<!-- 

             <div class="mb-4 row align-items-center">
                 <label
                     class="col-sm-3 col-form-label form-label-title">Subcategory</label>
                 <div class="col-sm-9">
                     <?= $form->field($model, 'product_sub_category_id', ['template' => '{input}{error}',])->widget(Select2::classname(), [
                            'data' => $subCategoryData, // Prepopulate with the current subcategory
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select Product Sub-Category ...', 'id' => 'product-subcategory', 'class' => 'js-example-basic-single w-100',],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]); ?>
                 </div>
             </div>

             <div class="mb-4 row align-items-center">
                 <label
                     class="col-sm-3 col-form-label form-label-title">Brand</label>
                 <div class="col-sm-9">
                     <?= $form->field($model, 'brand_id', [
                            'template' => '{input}{error}', // Removes the label and surrounding divs added by default
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Brand::find()->all(), 'id', 'name'),
                            'language' => 'en',
                            'options' => [
                                'placeholder' => 'Select Brand ...',
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
                 <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                 <div class="col-sm-9">
                     <?= $form->field($model, 'unit_id', [
                            'template' => '{input}{error}', // Removes the label and surrounding divs added by default
                        ])->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Unit::find()->all(), 'id', 'name'),
                            'language' => 'en',
                            'options' => [
                                'placeholder' => 'Select Unit ...',
                                // 'id' => 'product-category',
                                'class' => 'js-example-basic-single w-100', // Maintains the custom class styling
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]) ?>
                 </div>
             </div> -->

         </form>
     </div>
 </div>

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
            url: '/pos/product/get-subcategories', // Adjust to match your URL
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