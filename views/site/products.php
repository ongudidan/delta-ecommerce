<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = 'Products';
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

<!-- Poster Section Start -->
<?= $this->render('components/products/_poster') ?>

<!-- Poster Section End -->

<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <!-- shop side left bar start -->
            <?= $this->render('components/products/_shop-left-sidebar') ?>
            <!-- shop side left bar end -->


            <div class="col-custome-9">

                <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                    <!-- products start -->
                    <?php foreach ($dataProvider->getModels() as $index => $row): ?>
                        <div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="<?= Url::to(['/site/product-view', 'id' => $row->id]) ?>">
                                            <img src="/web/uploads/<?= $row->thumbnail ?>"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <!-- <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="wishlist.html" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name"><?= $row->productSubCategory->name ?></span>
                                        <a href="<?= Url::to(['/site/product-view', 'id' => $row->id]) ?>">
                                            <h5 class="name"><?= $row->name ?></h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content"><?= $row->description ?></p>

                                        <h5 class="price"><span class="theme-color">Ksh. <?= number_format($row->selling_price) ?></span> <del>$15.15</del>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- products end  -->

                </div>

                <nav class="custome-pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item" aria-current="page">
                            <a class="page-link" href="javascript:void(0)">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

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