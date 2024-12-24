<?php

use yii\helpers\Url;

// Get the current module, controller, and action
$module = Yii::$app->controller->module->id;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

?>
<div class="col-xxl-3 col-lg-4">
    <div class="dashboard-left-sidebar">
        <div class="close-button d-flex d-lg-none">
            <button class="close-sidebar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="profile-box">
            <div class="cover-image">
                <img src="/web/frontend/assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                    alt="">
            </div>

            <div class="profile-contain">
                <div class="profile-image">
                    <div class="position-relative">
                        <img src="/web/frontend/assets/images/inner-page/user/1.jpg"
                            class="blur-up lazyload update_img" alt="">
                        <div class="cover-icon">
                            <i class="fa-solid fa-pen">
                                <input type="file" onchange="readURL(this,0)">
                            </i>
                        </div>
                    </div>
                </div>

                <div class="profile-name">
                    <h3><?= Yii::$app->user->identity->username ?></h3>
                    <h6 class="text-content"><?= Yii::$app->user->identity->email ?></h6>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'index' ? 'active' : '' ?>" id="pills-dashboard-tab" href="<?= Url::to(['/user-dashboard/index']) ?>" role="tab"
                    aria-controls="pills-dashboard" aria-selected="<?= $action == 'index' ? 'true' : 'false' ?>">
                    <i data-feather="home"></i> DashBoard
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'orders' ? 'active' : '' ?>" id="pills-order-tab" href="<?= Url::to(['/user-dashboard/orders']) ?>" role="tab"
                    aria-controls="pills-order" aria-selected="<?= $action == 'orders' ? 'true' : 'false' ?>">
                    <i data-feather="shopping-bag"></i> Order
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'address' ? 'active' : '' ?>" id="pills-address-tab" href="<?= Url::to(['/user-dashboard/address']) ?>" role="tab"
                    aria-controls="pills-address" aria-selected="<?= $action == 'address' ? 'true' : 'false' ?>">
                    <i data-feather="map-pin"></i> Address
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'profile' ? 'active' : '' ?>" id="pills-profile-tab" href="<?= Url::to(['/user-dashboard/profile']) ?>" role="tab"
                    aria-controls="pills-profile" aria-selected="<?= $action == 'profile' ? 'true' : 'false' ?>">
                    <i data-feather="user"></i> Profile
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'security' ? 'active' : '' ?>" id="pills-security-tab" href="<?= Url::to(['/user-dashboard/security']) ?>" role="tab"
                    aria-controls="pills-security" aria-selected="<?= $action == 'security' ? 'true' : 'false' ?>">
                    <i data-feather="shield"></i> Security
                </a>
            </li>
        </ul>

    </div>
</div>