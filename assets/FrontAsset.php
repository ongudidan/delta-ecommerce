<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com,
 * @since 2.0
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // "https://fonts.gstatic.com",
        // "https://fonts.googleapis.com/css2?family=Russo+One&display=swap",
        // "https://fonts.googleapis.com/css2?family=Pacifico&display=swap",
        // "https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap",
        // "https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap",
        // "https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap",

        // "/web/frontend/assets/css/vendors/bootstrap.css",
        "/web/frontend/assets/css/animate.min.css",
        "/web/frontend/assets/css/vendors/font-awesome.css",
        "/web/frontend/assets/css/vendors/feather-icon.css",
        "/web/frontend/assets/css/vendors/slick/slick.css",
        "/web/frontend/assets/css/vendors/slick/slick-theme.css",
        "/web/frontend/assets/css/bulk-style.css",
        "/web/frontend/assets/css/style.css",

        "/web/custom/css/toastr.min.css",
        "/web/custom/css/toatr.css",


    ];
    public $js = [
        // "/web/frontend/assets/js/jquery-3.6.0.min.js",
        // "/web/frontend/assets/js/jquery-ui.min.js",
        "/web/frontend/assets/js/filter-sidebar.js",
        "/web/frontend/assets/js/bootstrap/bootstrap.bundle.min.js",
        "/web/frontend/assets/js/bootstrap/popper.min.js",
        "/web/frontend/assets/js/feather/feather.min.js",
        "/web/frontend/assets/js/feather/feather-icon.js",
        "/web/frontend/assets/js/lazysizes.min.js",
        "/web/frontend/assets/js/slick/slick.js",
        "/web/frontend/assets/js/slick/custom_slick.js",
        "/web/frontend/assets/js/bootstrap/bootstrap-notify.min.js",
        "/web/frontend/assets/js/auto-height.js",
        // "/web/frontend/assets/js/timer1.js",
        "/web/frontend/assets/js/fly-cart.js",
        "/web/frontend/assets/js/quantity-2.js",
        "/web/frontend/assets/js/wow.min.js",
        "/web/frontend/assets/js/custom-wow.js",
        "/web/frontend/assets/js/nav-tab.js",
        "/web/frontend/assets/js/script.js",


        "/web/custom/js/toastr.min.js",
        "/web/custom/js/toastr.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
