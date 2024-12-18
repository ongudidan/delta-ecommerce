    <div class="card">
        <div class="card-body">
            <div class="card-header-2">
                <h5>Product Price</h5>
            </div>

                <div class="mb-4 row align-items-center">
                    <label class="col-sm-3 form-label-title">price</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'selling_price', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label class="col-sm-3 form-label-title">Compare at
                        price</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'compare_price', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
        </div>
    </div>