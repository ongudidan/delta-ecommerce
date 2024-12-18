<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductSubCategory $model */

$this->title = 'Update Product Sub Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-sub-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
