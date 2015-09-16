<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        "fonts/icon-fonts/style.css",
        "css/owl-carousel/owl.carousel.css",
        "css/owl-carousel/owl.theme.css",
        "css/normalize.css",
        "css/main.css",
        "css/jquery.mCustomScrollbar.min.css",
    ];
    public $js = [
        "js/vendor/modernizr-2.8.3.min.js",
        "js/owl-carousel/owl.carousel.min.js",
        "js/jquery.mCustomScrollbar.concat.min.js",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
