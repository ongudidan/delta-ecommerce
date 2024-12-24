<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderPayment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-payment-form">







    <?php $form = ActiveForm::begin([
        'id' => 'payment-form',
        'action' => ['order-payment/create'], // Controller action for processing the payment
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'PhoneNumber')->textInput([
        'maxlength' => true,
        'placeholder' => 'Enter phone number (e.g., 2547xxxxxxxx)',
    ]) ?>

    <?= $form->field($model, 'Amount')->textInput([
        'type' => 'number',
        'step' => '0.01',
        'placeholder' => 'Enter amount',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>