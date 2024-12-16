<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Cart';
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

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-9">
                <div class="cart-table">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <tbody>
                                <?php if (!empty($dataProvider->getModels())): ?>
                                    <?php foreach ($dataProvider->getModels() as $index => $row): ?>
                                        <tr class="product-box-contain">
                                            <td class="product-detail">
                                                <div class="product border-0">
                                                    <a href="<?= Url::to(['/site/product-view', 'id' => $row->product_id]) ?>" class="product-image">
                                                        <img src="/web/uploads/<?= $row->product->thumbnail ?>"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="product-detail">
                                                        <ul>
                                                            <li class="name">
                                                                <a href="<?= Url::to(['/site/product-view', 'id' => $row->product_id]) ?>"><?= $row->product->name ?></a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <h4 class="table-title text-content">Price</h4>
                                                <h5>Ksh. <?= number_format($row->product->selling_price) ?></h5>
                                            </td>
                                            <td class="quantity">
                                                <h4 class="table-title text-content">Qty</h4>
                                                <div class="quantity-price">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            <button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                                                            <button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="subtotal">
                                                <h4 class="table-title text-content">Total</h4>
                                                <h5>Ksh. <?= number_format($row->product->selling_price * $row->quantity) ?></h5>
                                            </td>
                                            <td class="save-remove">
                                                <h4 class="table-title text-content">Action</h4>
                                                <a class="remove close_button" href="javascript:void(0)">Remove</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h4>Your cart is empty!</h4>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3">
                <div class="summery-box p-sticky">
                    <div class="summery-header">
                        <h3>Cart Total</h3>
                    </div>

                    <div class="summery-contain">
                      
                        <ul>
                            <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">$125.65</h4>
                            </li>

                        </ul>
                    </div>

                    <ul class="summery-total">
                        <li class="list-total border-top-0">
                            <h4>Total (KES)</h4>
                            <h4 class="price theme-color">$132.58</h4>
                        </li>
                    </ul>

                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <button onclick="location.href = 'checkout.html';"
                                    class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                            </li>

                            <li>
                                <button onclick="location.href = 'index.html';"
                                    class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->


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