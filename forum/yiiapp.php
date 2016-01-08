<?php
error_reporting(E_ALL | E_STRICT);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../common/config/bootstrap.php');
require(__DIR__ . '/../frontend/config/bootstrap.php');

require(__DIR__ . '/../common/components/RoslArrayHelper.php');
require(__DIR__ . '/../vendor/nill/forum/PhpBBWebUser.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../common/config/common.php'),
    require(__DIR__ . '/../common/config/common-local.php'),
    require(__DIR__ . '/../frontend/config/frontend.php'),
    require(__DIR__ . '/../frontend/config/frontend-local.php')
);

/*$application = new yii\web\Application($config);*/
/*$application->run();*/