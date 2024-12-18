<?php

use app\models\UserAddress;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$model = new UserAddress();

?>

<?php
$formAction = Yii::$app->controller->action->id === 'update'
    ? ['user-dashboard/update', 'id' => $model->id]
    : ['user-dashboard/create-address']; // Use 'create' action if it's not update
?>

<?php $form = ActiveForm::begin([
    // 'id' => 'main-form',
    'enableAjaxValidation' => false, // Disable if you're not using AJAX
    'action' => $formAction, // Set action based on create or update
    'method' => 'post',
]); ?>

<div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">
               
                    <div class="form-floating mb-4 theme-form-floating">
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                    </div>
               
                    <div class="form-floating mb-4 theme-form-floating">
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                    </div>
               
                    <div class="form-floating mb-4 theme-form-floating">
                        <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>
                    </div>
             
                    <div class="form-floating mb-4 theme-form-floating">
                        <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                <?= Html::submitButton('Save', ['class' => 'btn theme-bg-color btn-md text-white']) ?>

            </div>

        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>