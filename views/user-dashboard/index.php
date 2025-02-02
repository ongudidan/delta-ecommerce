<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;

// Get the current module, controller, and action
$module = Yii::$app->controller->module->id;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Loader Start -->
<?= $this->render('../site/components/common/_loader') ?>

<!-- Loader End -->

<!-- Header Start -->
<?= $this->render('../site/components/common/_header') ?>

<!-- Header End -->

<!-- mobile fix menu start -->
<?= $this->render('../site/components/common/_mobile-fix') ?>

<!-- mobile fix menu end -->

<!-- Breadcrumb Section Start -->
<?= $this->render('../site/components/common/_breadcrumb') ?>

<!-- Breadcrumb Section End -->
<!-- User Dashboard Section Start -->
<section class="user-dashboard-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <?= $this->render('components/_dashboard-sidebar') ?>


            <div class="col-xxl-9 col-lg-8">
                <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                    Menu</button>
                <div class="dashboard-right-sidebar">
                    <div class="tab-content" id="pills-tabContent">

                        <?php if ($controller == 'user-dashboard' && $action == 'index') { ?>
                            <?= $this->render('components/_dashboard', [
                                'totalOrdersCount' => $totalOrdersCount,
                                'completedCount' => $completedCount,
                                'pendingCount' => $pendingCount,
                                'cancelledCount' => $cancelledCount,
                            ]) ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'orders') { ?>
                            <?= $this->render('components/_orders', ['orderItems' => $orderItems]) ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'address') { ?>
                            <?= $this->render('components/_address', ['addresses' => $addresses,]) ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'profile') { ?>
                            <?= $this->render('components/_profile') ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'security') { ?>
                            <?= $this->render('components/_security') ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'password') { ?>
                            <?= $this->render('components/_password', ['model'=> $model]) ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'phone') { ?>
                            <?= $this->render('components/_phone', ['model' => $model]) ?>
                        <?php } ?>

                        <?php if ($controller == 'user-dashboard' && $action == 'email') { ?>
                            <?= $this->render('components/_email',['model' => $model]) ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- User Dashboard Section End -->

<!-- Footer Section Start -->
<?= $this->render('../site/components/common/_footer') ?>

<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<?= $this->render('../site/components/common/_quick-view-modal') ?>

<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<?= $this->render('../site/components/common/_location-modal') ?>

<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<?= $this->render('../site/components/common/_deal-box-modal') ?>

<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<?= $this->render('../site/components/common/_add-to-cart-modal') ?>

<!-- Add to cart Modal End -->

<!-- Add address modal box start -->
<?= $this->render('components/_address-modal') ?>

<!-- Add address modal box end -->

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
<!-- <div class="bg-overlay"></div> -->
<!-- Bg overlay End -->