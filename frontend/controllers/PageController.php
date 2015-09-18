<?php

namespace frontend\controllers;
use Yii;
use common\models\Pages;

class PageController extends \yii\web\Controller {
    public function actionIndex() {}

    public function actionShow($id) {
        $model = Pages::findOne(['id'=>$id,'status'=>1]);

        return $this->render('show', ['model'=>$model]);
    }
}