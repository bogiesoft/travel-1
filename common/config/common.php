<?php
use common\components\MainView;

require(__DIR__ . '/../../vendor/nill/forum/PhpBBWebUser.php');
require(__DIR__ . '/../../vendor/nill/forum/models/phpBBUsers.php');
require(__DIR__ . '/../../vendor/nill/forum/behaviors/PhpBBUserBahavior.php');
return [
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'aliases' => [
        '@file_save_dir' => '@common/files/',
        '@file_view_url' => '/files/',
        '@backend_file_view_dir' => '@backend/web/files',
        '@frontend_file_view_dir' => '@frontend/web/files'
    ],
    /*'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
    ],*/
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'roslPhpBb' => [
            'class' => \common\components\RoslPhpBbClass::className()
        ],
        'assetManager'=>[
            'appendTimestamp' => true,
            'bundles' =>  [
                \yii\web\JqueryAsset::className() => [
                    'js'=> [
                        "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js",
                    ],
                    'jsOptions' =>
                        [
                            'position' => MainView::POS_HEAD,
                        ],
                ],
            ]
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::className(),
            'cache' =>'cache',
            'defaultRoles' => ['super_admin','admin','user','moderator']
        ],
        'view' => [
            'class' => 'common\components\MainView',
        ],
        'mailer' => [
            'class' =>'common\components\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'messageConfig'    => [
                'from' => ['support@test.com'=>'Test Mailer'],
            ],

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
        'session' => [
            'class' => 'yii\web\DbSession'
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru-RU',
                ],
            ],
        ],
    ],
];
