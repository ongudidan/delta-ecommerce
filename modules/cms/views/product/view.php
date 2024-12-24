<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <p>
                                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'productSubCategory.name',
                                    'productSubCategory.productCategory.name',
                                    'brand.name',
                                    'unit.name',
                                    'name',
                                    'selling_price',
                                    'compare_price',
                                    'product_number',
                                    [
                                        'attribute' => 'specifications',
                                        'format' => 'html', // Render the specifications as HTML
                                        'contentOptions' => ['class' => 'text-wrap'],
                                    ],
                                    'status',
                                    [
                                        'attribute' => 'thumbnail',
                                        'label' => 'Thumbnail Image',
                                        'format' => 'html',
                                        'value' => function ($model) {
                                            return Html::img('/web/uploads/' . $model->thumbnail, [
                                                'alt' => 'Thumbnail',
                                                'class' => 'img-thumbnail',
                                                'style' => 'width: 150px;',
                                            ]);
                                        },
                                    ],
                                    [
                                        'attribute' => 'created_at',
                                        'label' => 'Created On',
                                        'value' => function ($model) {
                                            return Yii::$app->formatter->asDatetime($model->created_at, 'php:l, d F Y, h:i:s A');
                                        },
                                    ],
                                    [
                                        'attribute' => 'updated_at',
                                        'label' => 'Last Updated',
                                        'value' => function ($model) {
                                            return Yii::$app->formatter->asDatetime($model->updated_at, 'php:l, d F Y, h:i:s A');
                                        },
                                    ],


                                    'created_by',
                                    'updated_by',
                                    [
                                        'attribute' => 'description',
                                        'format' => 'html', // Render the description as HTML
                                        'contentOptions' => ['class' => 'text-wrap'],
                                    ],
                                ],
                            ]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>