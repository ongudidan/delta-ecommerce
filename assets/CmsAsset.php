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
class CmsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap",
        "/web/cms/assets/css/linearicon.css",
        "/web/cms/assets/css/vendors/font-awesome.css",
        "/web/cms/assets/css/vendors/themify.css",
        "/web/cms/assets/css/ratio.css",
        "/web/cms/assets/css/remixicon.css",
        "/web/cms/assets/css/vendors/feather-icon.css",
        "/web/cms/assets/css/vendors/scrollbar.css",
        "/web/cms/assets/css/vendors/animate.css",
        // "/web/cms/assets/css/vendors/bootstrap.css",
        "/web/cms/assets/css/vector-map.css",
        "/web/cms/assets/css/vendors/slick.css",
        "/web/cms/assets/css/style.css",


        "/web/cms/assets/css/vendors/dropzone.css",
        // "/web/cms/assets/css/select2.min.css",
        "/web/cms/assets/css/vendors/chartist.css",
        "/web/cms/assets/css/vendors/date-picker.css",
        "/web/cms/assets/css/vendors/bootstrap-tagsinput.css",

    ];
    public $js = [
        // "/web/cms/assets/js/jquery-3.6.0.min.js",
        // "/web/cms/assets/js/bootstrap/bootstrap.bundle.min.js",
        "/web/cms/assets/js/icons/feather-icon/feather.min.js",
        "/web/cms/assets/js/icons/feather-icon/feather-icon.js",
        "/web/cms/assets/js/scrollbar/simplebar.js",
        "/web/cms/assets/js/scrollbar/custom.js",
        "/web/cms/assets/js/config.js",
        "/web/cms/assets/js/tooltip-init.js",
        "/web/cms/assets/js/sidebar-menu.js",
        // "/web/cms/assets/js/notify/bootstrap-notify.min.js",
        // "/web/cms/assets/js/notify/index.js",
        "/web/cms/assets/js/chart/apex-chart/apex-chart1.js",
        "/web/cms/assets/js/chart/apex-chart/moment.min.js",
        "/web/cms/assets/js/chart/apex-chart/apex-chart.js",
        "/web/cms/assets/js/chart/apex-chart/stock-prices.js",
        "/web/cms/assets/js/chart/apex-chart/chart-custom1.js",
        "/web/cms/assets/js/slick.min.js",
        "/web/cms/assets/js/custom-slick.js",
        "/web/cms/assets/js/customizer.js",
        "/web/cms/assets/js/ratio.js",
        "/web/cms/assets/js/sidebareffect.js",
        "/web/cms/assets/js/script.js",



        "/web/cms/assets/js/bootstrap-tagsinput.min.js",
        "/web/cms/assets/js/dropzone/dropzone.js",
        "/web/cms/assets/js/dropzone/dropzone-script.js",
        "/web/cms/assets/js/ckeditor.js",
        "/web/cms/assets/js/ckeditor-custom.js",
        // "/web/cms/assets/js/select2.min.js",
        // "/web/cms/assets/js/select2-custom.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
