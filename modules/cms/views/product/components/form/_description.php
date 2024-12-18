<div class="card">
    <div class="card-body">
        <div class="card-header-2">
            <h5>Description</h5>
        </div>

        <div class="mb-4 row align-items-center">
            <div class="col-sm-12">
                <?= $form->field($model, 'description', ['template' => '{input}{error}',])->textarea(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
</div>