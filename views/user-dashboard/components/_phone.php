<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="col-lg-12">
    <div class="title d-xxl-none d-block">
        <h2>Update Phone Number</h2>
    </div>
    <div class="right-sidebar-box">
        <?php $form = ActiveForm::begin([
            'id' => 'update-phone-form',
            'options' => ['class' => 'row'],
        ]); ?>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <div class="mb-md-4 mb-3 custom-form">
                <?= $form->field($model, 'phone_no', [
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter Phone Number',
                    ],
                ])->label('Phone Number') ?>
            </div>
        </div>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <?= Html::submitButton('Update Phone Number', ['class' => 'btn btn-animation btn-md fw-bold ms-auto']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>