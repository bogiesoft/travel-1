<?php

namespace frontend\controllers;
use Yii;
use common\models\Advices;

class AdviceController extends \yii\web\Controller {
    public function actionIndex() {}

    public function actionShow($id) {
        $model = Advices::findOne(['id'=>$id]);

        return $this->render('show', ['model'=>$model]);
    }
}