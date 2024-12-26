<?php

use app\models\ProductCategory;
use app\models\ProductSubCategory;
use yii\helpers\Url;

$produtCategories = ProductCategory::find()->all();
?>

<!-- (d-block d-sm-none) classes prevent the section from appearing in desktop view -->
<div class="d-block d-sm-none">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category">
                            <i data-feather="align-left"></i>
                            <span>All Categories</span>
                        </button>

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                <?php foreach ($produtCategories as $row) { ?>
                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="/web/uploads/<?= $row->thumbnail ?>" alt="" />
                                            <h6><?= $row->name ?></h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <ul>
                                                    <?php
                                                    $subCategories = ProductSubCategory::find()->where(['product_category_id' => $row->id])->all();
                                                    $half = ceil(count($subCategories) / 2); // Split into two halves
                                                    $count = 0;

                                                    foreach ($subCategories as $subCategory) {
                                                        if ($count < $half) {
                                                            echo '<li><a href="' . Url::to(['/site/products', 'sub_category_id' => $subCategory->id]) . '">' . $subCategory->name . '</a></li>';
                                                        }
                                                        $count++;
                                                    }
                                                    ?>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <ul>
                                                    <?php
                                                    $subCategories = ProductSubCategory::find()->where(['product_category_id' => $row->id])->all();
                                                    $half = ceil(count($subCategories) / 2); // Split into two halves
                                                    $count = 0;

                                                    foreach ($subCategories as $subCategory) {
                                                        if ($count >= $half) {
                                                            echo '<li><a href="' . Url::to(['/site/products', 'sub_category_id' => $subCategory->id]) . '">' . $subCategory->name . '</a></li>';
                                                        }
                                                        $count++;
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>

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
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['/user-dashboard/index']) ?>" class="text-decoration-none px-3 py-2 d-block">Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['/user-dashboard/orders']) ?>" class="text-decoration-none px-3 py-2 d-block">Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['/site/about']) ?>" class="text-decoration-none px-3 py-2 d-block">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= Url::to(['/site/contact']) ?>" class="text-decoration-none px-3 py-2 d-block">Contact</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="header-nav-right">
                        <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                            <i data-feather="zap"></i>
                            <span>Deal Today</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>