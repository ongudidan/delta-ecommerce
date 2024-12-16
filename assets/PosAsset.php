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
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PosAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        "/web/custom/css/bootstrap.min.css",
        "/web/custom/css/feather.css",
        "/web/custom/css/flags.css",
        "/web/custom/css/fontawesome.min.css",
        "/web/custom/css/all.min.css",
        "/web/custom/css/style.css",
        "/web/custom/css/dan.css",
        "/web/custom/css/dan2.css",


        "/web/custom/css/datatables.min.css",
        "/web/custom/css/toastr.min.css",
        "https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap",

        // "/web/custom/otika/assets/css/style.css",


        // "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css",
        // "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css",

        "/web/custom/css/toatr.css",

        // "/web/custom/remos/css/animate.min.css",
        // "/web/custom/remos/css/animation.css",
        // // "/web/custom/remos/css/bootstrap.css",
        // "/web/custom/remos/css/bootstrap-select.min.css",
        // // "/web/custom/remos/css/style.css",


    ];
    public $js = [
        // "/web/custom/dashboard/assets/js/jquery-3.6.0.min.js",
        "/web/custom/js/bootstrap.bundle.min.js",
        "/web/custom/js/feather.min.js",
        "/web/custom/js/jquery.slimscroll.min.js",
        "/web/custom/js/apexcharts.min.js",
        "/web/custom/js/chart-data.js",
        "/web/custom/js/datatables.min.js",
        "/web/custom/js/sweetalert.min.js",
        "/web/custom/js/custom.js",
        // "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js",
        // "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js",
        //    "https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js",

        "/web/custom/otika/assets/bundles/datatables/datatables.min.js",
        "/web/custom/otika/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js",
        "/web/custom/otika/assets/js/page/datatables.js",
        "/web/custom/js/canvasjs.min.js",



        "/web/custom/js/toastr.min.js",
        "/web/custom/js/toastr.js",

        "/web/custom/js/script.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
