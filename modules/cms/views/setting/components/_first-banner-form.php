  <?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\Html;

    ?>
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