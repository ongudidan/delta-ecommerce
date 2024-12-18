  <div class="card">
      <div class="card-body">
          <div class="card-header-2">
              <h5>Product Images</h5>
          </div>

          <div class="row align-items-center">
              <label class="col-sm-3 col-form-label form-label-title">Thumbnail
                  Image</label>
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
      </div>
  </div>

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