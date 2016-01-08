<?php
require_once(__DIR__ . '/../../common/components/MainView.php');
use common\components\MainView;
use frontend\models\User;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@file_view_dir' => '@frontend/web/files',
    ],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '../../backend/web/images/store', //path to origin images
            'imagesCachePath' => '../../backend/web/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            //'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => User::className(),
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
          'bundles' =>[
            \yii\web\JqueryAsset::className() => [
                'js'=> [
                    "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js",
                ],
                'jsOptions' =>
                    [
                        'position' => MainView::POS_HEAD,
                    ],
            ],
            \yii\bootstrap\BootstrapAsset::className() => [
                'baseUrl' => '@web',
                'basePath' => '@webroot',
                'css' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css']
            ],
            \yii\bootstrap\BootstrapPluginAsset::className() =>[
                'js' => ['https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'],
            ]
        ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
