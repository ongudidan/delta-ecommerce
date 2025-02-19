<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Brand $model */

$this->title = 'Update Brand: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
