<?php

namespace frontend\controllers;
use Yii;

class NewsController extends \yii\web\Controller {
    public function actionIndex() {}

    public function actionShow($id) {
        $model = \common\models\News::findOne(['id'=>$id]);

        return $this->render('show',['model'=>$model]);
    }
}