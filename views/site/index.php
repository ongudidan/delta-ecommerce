<?php

/** @var yii\web\View $this */

use SebastianBergmann\CodeCoverage\Report\Html\Renderer;
use yii\helpers\Url;

$this->title = 'Home';
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

<!-- Home Section Start -->
<?= $this->render('components/home/_main-banner') ?>
<!-- Home Section End -->

<!-- Banner Section Start -->

<!-- Banner Section End -->

<!-- Product Section Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-12 col-xl-12">


                <div class="title">
                    <p>Top Categories Of The Week</p>
                </div>

                <div class="category-slider-2 product-wrapper no-arrow">
                    <?php foreach ($productCategories as $row) { ?>
                        <div>
                            <a href="<?= Url::to(['/site/products', 'category_id'=> $row->id]) ?>" class="category-box category-dark">
                                <div>
                                    <img src="/web/uploads/<?= $row->thumbnail ?>" class="blur-up lazyload" alt="" />
                                    <h5><?= $row->name ?></h5>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
<!-- 
                <div class="title title-flex">
                    <div>
                        <h2>Top Save Today</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="/web/frontend/assets/svg/leaf.svg#leaf"></use>
                            </svg>
                        </span>
                        <p>
                            Don't miss this opportunity at a special discount just for
                            this week.
                        </p>
                    </div>
               
                </div>

                <div class="section-b-space">
                    <div class="product-border border-row overflow-hidden">
                        <div class="product-box-slider no-arrow">
                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/1.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Fantasy Crunchy Choco Chip Cookies
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/2.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Cold Brew Coffee Instant Coffee 50 g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/3.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Peanut Butter Bite Premium Butter Cookies 600 g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="label-tag">
                                                <span>NEW</span>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/4.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        SnackAmor Combo Pack of Jowar Stick and Jowar
                                                        Chips
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/5.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Yumitos Chilli Sprinkled Potato Chips 100 g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/6.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Neu Farm Unpolished Desi Toor Dal 1 kg
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="label-tag">
                                                <span>NEW</span>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/7.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        healthy Long Life Toned Milk 1 L
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/8.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Dog Treats Natural Yak Milk Bars For Small Dogs
                                                        100g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/9.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Raw Mutton Leg, Packaging 5 Kg
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/10.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Blended Instant Coffee 50 g Buy 1 Get 1 Free
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row m-0">
                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/3.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Peanut Butter Bite Premium Butter Cookies 600 g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 px-0">
                                        <div class="product-box">
                                            <div class="product-image">
                                                <a href="product-left-thumbnail.html">
                                                    <img src="/web/frontend/assets/images/vegetable/product/5.png" class="img-fluid blur-up lazyload"
                                                        alt="" />
                                                </a>
                                                <ul class="product-option">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
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
                                                </ul>
                                            </div>
                                            <div class="product-detail">
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">
                                                        Yumitos Chilli Sprinkled Potato Chips 100 g
                                                    </h6>
                                                </a>

                                                <h5 class="sold text-content">
                                                    <span class="theme-color price">$26.69</span>
                                                    <del>28.56</del>
                                                </h5>

                                                <div class="product-rating mt-sm-2 mt-1">
                                                    <ul class="rating">
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star" class="fill"></i>
                                                        </li>
                                                        <li>
                                                            <i data-feather="star"></i>
                                                        </li>
                                                    </ul>

                                                    <h6 class="theme-color">In Stock</h6>
                                                </div>

                                                <div class="add-to-cart-box">
                                                    <button class="btn btn-add-cart addcart-button">
                                                        Add
                                                        <span class="add-icon">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </span>
                                                    </button>
                                                    <div class="cart_qty qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity"
                                                                value="0" />
                                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
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
                </div>


                <div class="section-t-space section-b-space">
                    <div class="row g-md-4 g-3">
                        <div class="col-md-6">
                            <div class="banner-contain hover-effect">
                                <img src="/web/frontend/assets/images/vegetable/banner/9.jpg" class="bg-img blur-up lazyload" alt="" />
                                <div class="banner-details p-center-left p-4">
                                    <div>
                                        <h3 class="text-exo">50% offer</h3>
                                        <h4 class="text-russo fw-normal theme-color mb-2">
                                            Testy Mushrooms
                                        </h4>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-sm mend-auto">
                                            Shop Now <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="banner-contain hover-effect">
                                <img src="/web/frontend/assets/images/vegetable/banner/10.jpg" class="bg-img blur-up lazyload" alt="" />
                                <div class="banner-details p-center-left p-4">
                                    <div>
                                        <h3 class="text-exo">50% offer</h3>
                                        <h4 class="text-russo fw-normal theme-color mb-2">
                                            Fresh MEAT
                                        </h4>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-sm mend-auto">
                                            Shop Now <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="title d-block">
                    <h2>Today Deals</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="/web/frontend/assets/svg/leaf.svg#leaf"></use>
                        </svg>
                    </span>
                    <!-- <p>A virtual assistant collects the products from your list</p> -->
                </div>

               <div class="col-custome-12">

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
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name"><?= $row->productSubCategory->name ?></span>
                                        <a href="<?= Url::to(['/site/product-view', 'id' => $row->id]) ?>">
                                            <h5 class="name"><?= $row->name ?></h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content"><?= $row->description ?></p>

                                        <h5 class="price"><span class="theme-color">Ksh. <?= number_format($row->selling_price) ?></span> <del>Ksh. <?= number_format($row->compare_price) ?></del>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- products end  -->

                </div>

                <nav class="custome-pagination">
                    <?= \yii\bootstrap5\LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => ['class' => 'pagination justify-content-center'], // Apply your custom class
                        'linkOptions' => ['class' => 'page-link'], // Style individual page links
                        'activePageCssClass' => 'active', // Class for the active page
                        'disabledPageCssClass' => 'disabled', // Class for disabled links
                        'prevPageLabel' => '<i class="fa-solid fa-angles-left"></i>', // Previous page icon
                        'nextPageLabel' => '<i class="fa-solid fa-angles-right"></i>', // Next page icon
                        'prevPageCssClass' => 'page-item', // Class for the previous page container
                        'nextPageCssClass' => 'page-item', // Class for the next page container
                        'pageCssClass' => 'page-item', // Class for each page container
                        'maxButtonCount' => 3, // Number of visible page buttons
                    ]); ?>
                </nav>

            </div>

            </div>
        </div>
</section>
<!-- Product Section End -->

<!-- Newsletter Section Start -->
<section class="newsletter-section section-b-space">
    <div class="container-fluid-lg">
        <div class="newsletter-box newsletter-box-2">
            <div class="newsletter-contain py-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                            <div class="newsletter-detail">
                                <h2>Join our newsletter and get...</h2>
                                <h5>$20 discount for your first order</h5>
                                <div class="input-box">
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Your Email" />
                                    <i class="fa-solid fa-envelope arrow"></i>
                                    <button class="sub-btn btn-animation">
                                        <span class="d-sm-block d-none">Subscribe</span>
                                        <i class="fa-solid fa-arrow-right icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter Section End -->

<!-- Footer Section Start -->
<?= $this->render('components/common/_footer') ?>
<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img src="/web/frontend/assets/images/product/category/1.jpg" class="img-fluid blur-up lazyload" alt="" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 class="title-name">
                                Peanut Butter Bite Premium Butter Cookies 600 g
                            </h4>
                            <h4 class="price">$36.99</h4>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <span class="ms-2">8 Reviews</span>
                                <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                            </div>

                            <div class="product-detail">
                                <h4>Product Details :</h4>
                                <p>
                                    Candy canes sugar plum tart cotton candy chupa chups sugar
                                    plum chocolate I love. Caramels marshmallow icing dessert
                                    candy canes I love soufflé I love toffee. Marshmallow pie
                                    sweet sweet roll sesame snaps tiramisu jelly bear claw.
                                    Bonbon muffin I love carrot cake sugar plum dessert
                                    bonbon.
                                </p>
                            </div>

                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Brand Name:</h5>
                                        <h6>Black Forest</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Code:</h5>
                                        <h6>W0690034</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Type:</h5>
                                        <h6>White Cream Cake</h6>
                                    </div>
                                </li>
                            </ul>

                            <div class="select-size">
                                <h4>Cake Size :</h4>
                                <select class="form-select select-form-size">
                                    <option selected>Select Size</option>
                                    <option value="1.2">1/2 KG</option>
                                    <option value="0">1 KG</option>
                                    <option value="1.5">1/5 KG</option>
                                    <option value="red">Red Roses</option>
                                    <option value="pink">With Pink Roses</option>
                                </select>
                            </div>

                            <div class="modal-button">
                                <button onclick="location.href = 'cart.html';" class="btn btn-md add-cart-button icon">
                                    Add To Cart
                                </button>
                                <button onclick="location.href = 'product-left.html';"
                                    class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Choose your Delivery Location
                </h5>
                <p class="mt-1 text-content">
                    Enter your address and we will specify the offer for your area.
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="location-list">
                    <div class="search-input">
                        <input type="search" class="form-control" placeholder="Search Your Area" />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <div class="disabled-box">
                        <h6>Select a Location</h6>
                    </div>

                    <ul class="location-select custom-height">
                        <li>
                            <a href="javascript:void(0)">
                                <h6>Alabama</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Arizona</h6>
                                <span>Min: $150</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>California</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Colorado</h6>
                                <span>Min: $140</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Florida</h6>
                                <span>Min: $160</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Georgia</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Kansas</h6>
                                <span>Min: $170</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Minnesota</h6>
                                <span>Min: $120</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>New York</h6>
                                <span>Min: $110</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <h6>Washington</h6>
                                <span>Min: $130</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/web/frontend/assets/images/vegetable/product/10.png" class="blur-up lazyload" alt="" />
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/web/frontend/assets/images/vegetable/product/11.png" class="blur-up lazyload" alt="" />
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/web/frontend/assets/images/vegetable/product/12.png" class="blur-up lazyload" alt="" />
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/web/frontend/assets/images/vegetable/product/13.png" class="blur-up lazyload" alt="" />
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

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