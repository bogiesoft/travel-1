<?php


namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AngularAsset extends AssetBundle
{
    public $js = [
        "js/lodash.js",
        "js/angular.js",
        "js/ng-simple-logger-index.js",
        "js/angular-app.js",
        "js/angular-google-maps.min.js",
        "http://maps.googleapis.com/maps/api/js?sensor=false",
        "https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0-beta.0/angular-sanitize.min.js",
    ];
}
