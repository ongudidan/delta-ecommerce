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
                    <i data-feather="shopping-bag"></i> My Order
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'address' ? 'active' : '' ?>" id="pills-address-tab" href="<?= Url::to(['/user-dashboard/address']) ?>" role="tab"
                    aria-controls="pills-address" aria-selected="<?= $action == 'address' ? 'true' : 'false' ?>">
                    <i data-feather="map-pin"></i> Addresses
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'password' ? 'active' : '' ?>" id="pills-password-tab" href="<?= Url::to(['/user-dashboard/password']) ?>" role="tab"
                    aria-controls="pills-password" aria-selected="<?= $action == 'password' ? 'true' : 'false' ?>">
                    <i data-feather="shield"></i> Password
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'phone' ? 'active' : '' ?>" id="pills-phone-tab" href="<?= Url::to(['/user-dashboard/phone']) ?>" role="tab"
                    aria-controls="pills-phone" aria-selected="<?= $action == 'phone' ? 'true' : 'false' ?>">
                    <i data-feather="shield"></i> Phone No
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $action == 'email' ? 'active' : '' ?>" id="pills-email-tab" href="<?= Url::to(['/user-dashboard/email']) ?>" role="tab"
                    aria-controls="pills-email" aria-selected="<?= $action == 'email' ? 'true' : 'false' ?>">
                    <i data-feather="shield"></i> Email
                </a>
            </li>
        </ul>

    </div>
</div>