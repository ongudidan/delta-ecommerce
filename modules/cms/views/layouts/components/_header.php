<?php

use app\models\SiteInfo;
use yii\helpers\Url;

$logo = SiteInfo::find()->one()->logo ?? '';
// print_r($logo);

?>
<div class="page-header">
    <div class="header-wrapper m-0">
        <div class="header-logo-wrapper p-0">
            <div class="logo-wrapper">
                <a href="<?= Url::to(['/cms/default/index']) ?>">
                    <!-- <img class="img-fluid main-logo" src="/web/cms/assets/images/logo/1.png" alt="logo"> -->
                    <img class="img-fluid main-logo" src="/web/uploads/<?= $logo ?? '' ?>" alt="logo">

                    <!-- <img class="img-fluid white-logo" src="/web/cms/assets/images/logo/1-white.png" alt="logo"> -->
                    <img class="img-fluid white-logo" src="/web/uploads/<?= $logo ?? '' ?>" alt="logo">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                <a href="<?= Url::to(['/cms/default/index']) ?>">
                    <img src="/web/uploads/<?= $logo ?? '' ?>" class="img-fluid" alt="">
                </a>
            </div>
        </div>

        <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
               
                <li class="profile-nav onhover-dropdown pe-0 me-0">
                    <div class="media profile-media">
                        <div class="user-name-hide media-body">
                            <!-- <span>Emay Walter</span> -->
                            <p class="mb-0 font-roboto"><?= Yii::$app->user->identity->username ?? 'Guest' ?><i class="middle ri-arrow-down-s-line"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">

                        <li>
                            <a href="/cms/order/index">
                                <i data-feather="archive"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="support-ticket.html">
                                <i data-feather="phone"></i>
                                <span>Spports Tickets</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="/cms/setting/index">
                                <i data-feather="settings"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                href="/site/logout">
                                <i data-feather="log-out"></i>
                                <span>Log out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>