<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="col-lg-12">
    <div class="title">
        <h2>Change Password</h2>
    </div>
    <div class="right-sidebar-box">
        <?php $form = ActiveForm::begin([
            'id' => 'change-password-form',
            'options' => ['class' => 'row'],
        ]); ?>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <div class="mb-md-4 mb-3 custom-form">
                <?= $form->field($model, 'oldPassword', [
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter Old Password',
                    ],
                ])->passwordInput()->label('Old Password') ?>
            </div>
        </div>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <div class="mb-md-4 mb-3 custom-form">
                <?= $form->field($model, 'newPassword', [
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Enter New Password',
                    ],
                ])->passwordInput()->label('New Password') ?>
            </div>
        </div>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <div class="mb-md-4 mb-3 custom-form">
                <?= $form->field($model, 'confirmNewPassword', [
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Confirm New Password',
                    ],
                ])->passwordInput()->label('Confirm New Password') ?>
            </div>
        </div>

        <div class="col-xxl-12 col-lg-12 col-sm-12">
            <?= Html::submitButton('Change Password', ['class' => 'btn btn-animation btn-md fw-bold ms-auto']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>