<?php

namespace frontend\controllers;
use common\models\Countries;
use Yii;
use common\models\Events;

class EventsController extends \yii\web\Controller {
    public function actionIndex() {
        $models = Countries::find()->limit(10)->all();

        return $this->render('index', ['models' => $models]);
    }

    public function actionShow($id) {
        $model = Events::findOne(['id'=>$id]);
        $country = Countries::findOne($model->country_id);

        return $this->render('show',['model'=>$model,'country'=>$country]);
    }

    public function actionCountry($id) {
        $models = Events::find()->where(['status'=>1, 'country_id'=>$id])->all();
        $country = Countries::findOne($id);

        return $this->render('country',['models'=>$models, 'country'=>$country]);
    }
}