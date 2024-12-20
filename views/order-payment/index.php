<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
?>
<h1>order-payment/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>


<div class="payment-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'payment-form',
        'action' => ['order-payment/process'], // Controller action for processing the payment
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'phone_number')->textInput([
        'maxlength' => true,
        'placeholder' => 'Enter phone number (e.g., 2547xxxxxxxx)',
    ]) ?>

    <?= $form->field($model, 'amount')->textInput([
        'type' => 'number',
        'step' => '0.01',
        'placeholder' => 'Enter amount',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>