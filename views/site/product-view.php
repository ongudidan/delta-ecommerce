<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['products']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<!-- Loader Start -->
<?= $this->render('components/common/_loader') ?>

<!-- Loader End -->

<!-- Header Start -->
<?= $this->render('components/common/_header') ?>

<!-- Header End -->

<!-- mobile fix menu start -->
<?= $this->render('components/common/_mobile-fix') ?>

<!-- mobile fix menu end -->

<!-- Breadcrumb Section Start -->
<?= $this->render('components/common/_breadcrumb') ?>

<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="product-main-2 no-arrow">
                                        <div>
                                            <div class="slider-image">
                                                <img src="/web/uploads/<?= $model->thumbnail ?>"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h2 class="name"><?= $model->name ?></h2>
                            <div class="price-rating">
                                <h3 class="theme-color price">Ksh. <?= number_format($model->selling_price) ?> <del class="text-content">Ksh. <?= number_format($model->compare_price) ?> </del>
                            </div>

                            <div class="note-box product-packege">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'add-to-cart-form',
                                    'action' => Url::to(['site/add']),
                                    'options' => [
                                        'class' => 'cart-form',
                                        // 'onsubmit' => 'submitAddToCartForm(event)',
                                    ],
                                ]); ?>

                                <?= Html::hiddenInput('product_id', $model->id); // Set $productId dynamically 
                                ?>

                                <div class="row align-items-center">
                                    <!-- Quantity Section -->
                                    <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                                        <div class="cart_qty qty-box product-qty">
                                            <div class="input-group w-100">
                                                <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <?= Html::textInput('quantity', 1, [
                                                    'class' => 'form-control input-number qty-input',
                                                    'name' => 'quantity',
                                                ]); ?>
                                                <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <div class="col-md-6 col-sm-12">
                                        <?= Html::submitButton('Add To Cart', [
                                            'class' => 'btn btn-md bg-dark cart-button text-white w-100',
                                        ]); ?>
                                    </div>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Description</button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="product-description">
                                        <div class="nav-desh">
                                            <p><?= $model->description ?></p>
                                        </div>
                               
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Product Left Sidebar End -->

<!-- Footer Section Start -->
<?= $this->render('components/common/_footer') ?>

<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<?= $this->render('components/common/_quick-view-modal') ?>

<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<?= $this->render('components/common/_location-modal') ?>

<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<?= $this->render('components/common/_deal-box-modal') ?>

<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<?= $this->render('components/common/_add-to-cart-modal') ?>

<!-- Add to cart Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

