<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductCategory $model */

$this->title = 'Create Product Category';
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
