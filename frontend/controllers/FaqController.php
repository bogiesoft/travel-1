<?php

namespace frontend\controllers;
use common\models\Faq;
use Yii;

class FaqController extends \yii\web\Controller {
    public function actionIndex() {
        $models = Faq::find()->orderBy('order')->all();

        return $this->render('index', [
            'models'=>$models
        ]);
    }
}