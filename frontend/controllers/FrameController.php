<?php

namespace frontend\controllers;
use Yii;
use common\models\Pages;

class FrameController extends \yii\web\Controller {

    public function behaviors()
    {
        $behaviors = [];
        return $behaviors;
    }

    public function actionIndex($url = '') {

        return $this->renderPartial('index', ['url'=>$url]);
    }
}