<?php

use app\models\CartProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\User;

// Assuming you're using Yii's ActiveRecord for CartProduct model
$userId = Yii::$app->user->id; // Get the logged-in user's ID

// Calculate the total quantity for the logged-in user
$totalQuantity = CartProduct::find()
    ->where(['user_id' => $userId])
    ->sum('quantity');
    if($totalQuantity <= 0){
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
                        <span class="text-white">1418 Riverwood Drive, CA 96052, US</span>
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

                <div class="col-lg-3">
                    <ul class="about-list right-nav-about">
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-language" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="/web/frontend/assets/images/country/united-states.png" class="img-fluid blur-up lazyload" alt="" />
                                    <span>English</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="english">
                                            <img src="/web/frontend/assets/images/country/united-kingdom.png" class="img-fluid blur-up lazyload"
                                                alt="" />
                                            <span>English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="france">
                                            <img src="/web/frontend/assets/images/country/germany.png" class="img-fluid blur-up lazyload" alt="" />
                                            <span>Germany</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                            <img src="/web/frontend/assets/images/country/turkish.png" class="img-fluid blur-up lazyload" alt="" />
                                            <span>Turki</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-dollar" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <span>USD</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu" aria-labelledby="select-dollar">
                                    <li>
                                        <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
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
                            <img src="/web/frontend/assets/images/logo/1.png" class="img-fluid blur-up lazyload" alt="" />
                        </a>

                        <!-- <div class="middle-box">

                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="I'm searching for..."
                                        aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->

                        <div class="middle-box flex-grow-1 justify-content-center align-items-center px-4">
                            <div class="search-box w-100">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="I'm searching for..."
                                        aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <button class="btn" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


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
                                    <a href="contact-us.html" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="phone-call"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>24/7 Delivery</h6>
                                            <h5>+91 888 104 2340</h5>
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

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Home</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="index.html">Kartshop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-2.html">Sweetshop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-3.html">Organic</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-4.html">Supershop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-5.html">Classic shop</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-6.html">Furniture</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-7.html">Search Oriented</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-8.html">Category Focus</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="index-9.html">Fashion</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Shop</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="shop-category-slider.html">Shop
                                                        Category Slider</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-category.html">Shop
                                                        Category Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-banner.html">Shop Banner</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                        Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-list.html">Shop List</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                        Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-top-filter.html">Shop Top
                                                        Filter</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Product</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="product-4-image.html">Product
                                                        4 Image</a>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a href="javascript:void(0)" class="dropdown-item">Product
                                                        Thumbnail</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="product-left-thumbnail.html">Left Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-right-thumbnail.html">Right
                                                                Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-bottom-thumbnail.html">Bottom
                                                                Thumbnail</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="product-bundle.html" class="dropdown-item">Product
                                                        Bundle</a>
                                                </li>
                                                <li>
                                                    <a href="product-slider.html" class="dropdown-item">Product
                                                        Slider</a>
                                                </li>
                                                <li>
                                                    <a href="product-sticky.html" class="dropdown-item">Product
                                                        Sticky</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                href="javascript:void(0)" data-bs-toggle="dropdown">Mega Menu</a>

                                            <div class="dropdown-menu dropdown-menu-2">
                                                <div class="row">
                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Daily Vegetables</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Beans
                                                            & Brinjals</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Broccoli & Cauliflower</a>

                                                        <a href="shop-left-sidebar.html"
                                                            class="dropdown-item">Chilies, Garlic</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Gourd, Cucumber</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Herbs
                                                            & Sprouts</a>

                                                        <a href="demo-personal-portfolio.html"
                                                            class="dropdown-item">Lettuce & Leafy</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Baby Tender</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Beans
                                                            & Brinjals</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Broccoli & Cauliflower</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Chilies, Garlic</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Gourd, Cucumber</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Potatoes & Tomatoes</a>

                                                        <a href="shop-left-sidebar.html" class="dropdown-item">Peas
                                                            & Corn</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Exotic Vegetables</h5>
                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Asparagus & Artichokes</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Avocados & Peppers</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Broccoli & Zucchini</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Celery, Fennel & Leeks</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Chilies & Lime</a>
                                                    </div>

                                                    <div class="dropdown-column dropdown-column-img col-3"></div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Blog</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="blog-detail.html">Blog Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog-list.html">Blog List</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown new-nav-item">
                                            <label class="new-dropdown">New</label>
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Email
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a
                                                                href="../email-templete/abandonment-email.html">Abandonment</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/offer-template.html">Offer
                                                                Template</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/order-success.html">Order
                                                                Success</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/reset-password.html">Reset
                                                                Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="../email-templete/welcome.html">Welcome
                                                                template</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Invoice
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="../invoice/invoice-1.html">Invoice 1</a>
                                                        </li>

                                                        <li>
                                                            <a href="../invoice/invoice-2.html">Invoice 2</a>
                                                        </li>

                                                        <li>
                                                            <a href="../invoice/invoice-3.html">Invoice 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="404.html">404</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="about-us.html">About Us</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="cart.html">Cart</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="contact-us.html">Contact</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="compare.html">Compare</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="faq.html">Faq</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order-success.html">Order
                                                        Success</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order-tracking.html">Order
                                                        Tracking</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="otp.html">OTP</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="search.html">Search</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="user-dashboard.html">User
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Seller</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="seller-become.html">Become a
                                                        Seller</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-dashboard.html">Seller
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-detail.html">Seller
                                                        Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-detail-2.html">Seller
                                                        Detail 2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-grid.html">Seller Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-grid-2.html">Seller Grid
                                                        2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>