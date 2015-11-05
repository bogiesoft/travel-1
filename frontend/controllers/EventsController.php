<?php

namespace frontend\controllers;
use common\models\Countries;
use Yii;
use common\models\Events;

class EventsController extends \yii\web\Controller {
    public function actionIndex() {

        $category = (int)Yii::$app->getRequest()->getQueryParam('category');
        $country = (int)Yii::$app->getRequest()->getQueryParam('country');
        $limit = (int)Yii::$app->getRequest()->getQueryParam('limit') ? (int)Yii::$app->getRequest()->getQueryParam('limit') : 10;
        $where = [];
        if($country) {
            $where['id'] = $country;
        }
        $models = Countries::find()->where($where)->limit($limit)->all();
        $showMoreButton = (int)Countries::find()->count() > $limit;

        $where = [];
        $limitOut = '/events/?limit='.($limit+10);
        if($category) {
            $where['event_category_id'] = $category;
            $limitOut .= '&category='.$category;
        }

        $where['status'] = 1;

        return $this->render('index', [
            'models' => $models,
            'where' => $where,
            'limit' => $limitOut,
            'showMoreButton' => $showMoreButton
        ]);
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