<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\CmsAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

CmsAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="bg-effect">
    <?php $this->beginBody() ?>

    <!-- page-wrapper Start-->

    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?= $this->render('components/_header') ?>
        <!-- Page Header End-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            <?= $this->render('components/_sidebar') ?>
            <!-- Page Sidebar Ends-->

            <!-- index body start -->
            <main>
                <div>
                    <?= $content ?>
                </div>
            </main>
            <!-- index body end -->

        </div>
        <!-- Page Body Ends-->

    </div>

    <!-- page-wrapper Ends-->

    <!-- Modal Start -->
    <?= $this->render('components/_logout-modal') ?>
    <!-- Modal End -->





    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>