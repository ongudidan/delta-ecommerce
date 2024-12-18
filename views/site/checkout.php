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
<!-- Checkout section Start -->

<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$formAction = Yii::$app->controller->action->id === 'create-order'
    ? ['site/update', 'id' => $model->id]
    : ['site/create-order']; // Use 'create' action if it's not update
?>

<?php $form = ActiveForm::begin([
    // 'id' => 'main-form',
    // 'enableAjaxValidation' => false, // Disable if you're not using AJAX
    'action' => 'create-order', // Set action based on create or update
    'method' => 'post',
]); ?>

<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-lg-8">
                <div class="left-sidebar-checkout">
                    <div class="checkout-detail-box">
                        <ul>
                            <!-- Delivery Address Section -->
                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                        class="lord-icon">
                                    </lord-icon>
                                </div>
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h4>Delivery Address</h4>
                                    </div>
                                    <div class="checkout-detail">
                                        <div class="row g-4">
                                            <?php if (!empty($addresses)): ?>
                                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div>
                                                        <?php
                                                        // Prepare an array of addresses for the radio list
                                                        $addressItems = [];
                                                        foreach ($addresses as $address) {
                                                            $addressItems[$address->id] = "{$address->first_name}, {$address->address}, Phone: {$address->phone_no}";
                                                        }
                                                        ?>
                                                        <?= $form->field($model, 'address_id')->radioList(
                                                            $addressItems,

                                                        ) ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-12">
                                                    <p class="text-center text-muted">No addresses found. Please add a new address.</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <!-- Payment Option Section -->
                            <li>
                                <div class="checkout-icon">
                                    <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                        class="lord-icon">
                                    </lord-icon>
                                </div>
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h4>Payment Option</h4>
                                    </div>
                                    <div class="checkout-detail">
                                        <div class="row g-4">
                                            <div class="col-xxl-6 col-lg-12 col-md-6">
                                                <div>
                                                    <?= $form->field($model, 'payment_option', ['template' => '{input}{error}'])->radioList([
                                                        'Cash On Delivery' => 'Cash On Delivery',
                                                        'Online Payment' => 'Online Payment',
                                                    ]) ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="col-lg-4">
                <div class="right-side-summery-box">
                    <div class="summery-box-2">
                        <div class="summery-header">
                            <h3>Order Summary</h3>
                        </div>

                        <ul class="summery-contain">
                            <?php
                            $subtotal = 0; // Initialize subtotal
                            if (!empty($cartProducts)):
                            ?>
                                <?php foreach ($cartProducts as $cartProduct):
                                    $productTotal = $cartProduct->product->selling_price * $cartProduct->quantity;
                                    $subtotal += $productTotal; // Add to subtotal
                                ?>
                                    <li>
                                        <img src="/web/uploads/<?= $cartProduct->product->thumbnail ?>"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4><?= $cartProduct->product->name ?> <span>X <?= $cartProduct->quantity ?></span></h4>
                                        <h4 class="price">Ksh. <?= number_format($productTotal) ?></h4>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>
                                    <p>No products found in your cart.</p>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <ul class="summery-total">
                            <!-- <li>
                                <h4>Subtotal</h4>
                                <h4 class="price">Ksh. <?= number_format($subtotal) ?></h4>
                            </li> -->
                            <li class="list-total">
                                <h4>Total (KES)</h4>
                                <h4 class="price">Ksh. <?= number_format($subtotal) ?></h4> <!-- Assuming no additional charges -->
                            </li>
                        </ul>
                    </div>

                    <?= Html::submitButton('Place Order', ['class' => 'btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold']) ?>

                </div>
            </div>

        </div>
    </div>
</section>

<?php ActiveForm::end(); ?>

<!-- Checkout section End -->

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