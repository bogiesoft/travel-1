<?php
namespace frontend\controllers;
use common\models\Reviews;
use Yii;
use \common\models\Webcam;
use common\models\Cities;
use common\models\Countries;

class ReviewsController extends \yii\web\Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    function actionIndex() {
        $city = Yii::$app->getRequest()->getQueryParam('city');
        $country = Yii::$app->getRequest()->getQueryParam('country');
        $where = [];
        if($city) {
            $where['city_id'] = $city;
        }
        if($country) {
            $where['country_id'] = $country;
        }

        $models = Reviews::find()->where($where)->orderBy('created_at DESC')->all();

        return $this->render('index', ['models'=>$models]);
    }
}