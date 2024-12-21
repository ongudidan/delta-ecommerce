<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderPayment $model */

$this->title = 'Update Order Payment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
