<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\CmsAsset;

use yii\bootstrap5\Html;


CmsAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '/web/frontend/assets/images/favicon/1.png']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
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
                    <?php
                    $flashes = Yii::$app->session->getAllFlashes();
                    if (!empty($flashes)) {
                        $js = <<<JS
        toastr.options = {
            "closeButton": true, // Enable close button
            "progressBar": true, // Enable progress bar
            "timeOut": 500 // Duration for which the message is displayed
        };
    JS;

                        foreach ($flashes as $type => $message) {
                            // Map Yii flash types to Toastr types
                            $toastrType = $type === 'error' ? 'error' : ($type === 'success' ? 'success' : 'info');
                            $escapedMessage = addslashes($message);
                            $js .= "\ntoastr.{$toastrType}('{$escapedMessage}');";
                        }
                        $this->registerJs($js);
                    }
                    ?>
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