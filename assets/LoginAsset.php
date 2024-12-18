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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',

        "/web/custom/css/bootstrap.min.css",
        "/web/custom/css/feather.css",
        "/web/custom/css/flags.css",
        "/web/custom/css/fontawesome.min.css",
        "/web/custom/css/all.min.css",
        "/web/custom/css/style.css",
    ];
    public $js = [
        "/web/custom/js/jquery-3.6.0.min.js",
        "/web/custom/js/bootstrap.bundle.min.js",
        "/web/custom/js/feather.min.js",
        "/web/custom/js/script.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}