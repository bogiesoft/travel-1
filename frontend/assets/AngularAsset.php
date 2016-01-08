<?php


namespace frontend\assets;

use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
{
    public $js = [
        "js/lodash.js",
        "js/angular.js",
        "js/ng-simple-logger-index.js",
        "js/angular-bootstrap-select.js",
        "js/angular-google-maps.min.js",
        "js/angular-app.js",
        "http://maps.googleapis.com/maps/api/js?sensor=false",
        "https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0-beta.0/angular-sanitize.min.js",
    ];
    public $depends = [
        'frontend\assets\AppAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
