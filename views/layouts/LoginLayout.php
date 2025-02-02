<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\LoginAsset;

use yii\bootstrap5\Html;

LoginAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '/web/uploads/ . $favicon' ?? '']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?= $content ?>
        </div>
    </main>

    <?php
    $flashes = Yii::$app->session->getAllFlashes();
    if (!empty($flashes)) {
        $js = <<<JS
            toastr.options = {
                "closeButton": true, // Enable close button
                "progressBar": true, // Enable progress bar
                "timeOut": 5000 // Duration for which the message is displayed
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
    
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>