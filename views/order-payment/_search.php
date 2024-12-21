<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderPaymentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'MerchantRequestID') ?>

    <?= $form->field($model, 'CheckoutRequestID') ?>

    <?= $form->field($model, 'ResultCode') ?>

    <?= $form->field($model, 'ResultDesc') ?>

    <?php // echo $form->field($model, 'Amount') ?>

    <?php // echo $form->field($model, 'MpesaReceiptNumber') ?>

    <?php // echo $form->field($model, 'TransactionDate') ?>

    <?php // echo $form->field($model, 'PhoneNumber') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
