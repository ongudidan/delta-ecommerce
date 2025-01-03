<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Unit $model */
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
                                    <h5>Create Unit</h5>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Name</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'name', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Abbreviation</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'abbreviation', ['template' => '{input}{error}',])->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 form-label-title">Status</label>
                                    <div class="col-sm-9">
                                        <?= $form->field($model, 'status', ['template' => '{input}{error}'])->dropDownList(
                                            [
                                                'active' => 'Active', // Value 10 for active status
                                                'inactive' => 'Inactive', // Value 0 for inactive status
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