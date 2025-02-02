<?php

use app\models\CartProduct;
use app\models\ContactInfo;
use app\models\ProductSearch;
use app\models\SiteInfo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\User;
use yii\widgets\ActiveForm;


$logo = SiteInfo::find()->one()->logo ?? '';
$searchModel = new ProductSearch();

// Assuming you're using Yii's ActiveRecord for CartProduct model
$userId = Yii::$app->user->id; // Get the logged-in user's ID

// Calculate the total quantity for the logged-in user
$totalQuantity = CartProduct::find()
    ->where(['user_id' => $userId])
    ->sum('quantity');
if ($totalQuantity <= 0) {
    $totalQuantity = 0;
}
?>
<header class="pb-md-4 pb-0">
    <!-- <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <i class="iconly-Location icli text-white"></i>
                        <span class="text-white"><?= ContactInfo::find()->one()->address ?? '' ?></span>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6>
                                        <strong class="me-1">Welcome to Fastkart!</strong>Wrap
                                        new offers/gift every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                                        </strong>
                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>
                                        Something you love is now on sale!
                                        <a href="shop-left-sidebar.html" class="text-white">Buy Now !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                            <span class="navbar-toggler-icon">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </button>
                        <a href="<?= Url::to(['/site/index']) ?>" class="web-logo nav-logo">
                            <!-- <img src="/web/frontend/assets/images/logo/1.png" class="img-fluid blur-up lazyload" alt="" /> -->
                            <img src="/web/uploads/<?= $logo ?? '' ?>" class="img-fluid blur-up lazyload" alt="" />

                        </a>

                        <?php

                        $form = ActiveForm::begin([
                            'method' => 'get',
                            'action' => ['site/products'], // Action URL
                            'options' => ['class' => 'middle-box flex-grow-1 justify-content-center align-items-center px-4'],
                        ]);
                        ?>

                        <div class="search-box w-100">
                            <?= $form->field($searchModel, 'name', [
                                'template' => '
                                    <div class="input-group">
                                        {input}
                                        <button class="btn" type="submit">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>',
                            ])->textInput([
                                'class' => 'form-control',
                                'placeholder' => "I'm searching for...",
                            ]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>


                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here.." />
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="<?= Url::to('/site/contact')  ?>" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="phone-call"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>24/7 Delivery</h6>
                                            <h5><?= ContactInfo::find()->one()->phone ?? '' ?></h5>
                                        </div>
                                    </a>
                                </li>

                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <a href="<?= Url::to(['/site/cart']) ?>" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <!-- Display badge -->
                                            <?php if ($userId) { ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge">
                                                    <?= Html::encode($totalQuantity) ?? 0 ?>
                                                </span>
                                            <?php } ?>
                                        </a>
                                    </div>
                                </li>

                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <?php if (Yii::$app->user->isGuest): ?>
                                                <h6>Hello,</h6>
                                                <h5>Guest</h5>
                                            <?php else: ?>
                                                <h6>Hello,</h6>
                                                <h5><?= Yii::$app->user->identity->username ?></h5>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            <?php if (Yii::$app->user->isGuest): ?>
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="<?= Url::to(['/site/login']) ?>">Log In</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="<?= Url::to(['/site/signup']) ?>">Register</a>
                                                </li>

                                            <?php else: ?>
                                                <li class="product-box-contain">
                                                    <a href="<?= Url::to(['/user-dashboard/index']) ?>">Dashboard</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="<?= Url::to(['/user-dashboard/address']) ?>">Address Box</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="<?= Url::to(['/user-dashboard/orders']) ?>">Orders</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <a href="<?= Url::to(['/site/logout']) ?>" data-method="post">Log Out</a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_all-categories') ?>

</header>