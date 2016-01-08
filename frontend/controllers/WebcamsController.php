<?php
namespace frontend\controllers;
use Yii;
use \common\models\Webcam;
use common\models\Cities;
use common\models\Countries;

    class WebcamsController extends \yii\web\Controller {

        public function beforeAction($action) {
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
        }

        function actionIndex() {
            $city = Yii::$app->getRequest()->getQueryParam('city');
            $country = Yii::$app->getRequest()->getQueryParam('country');
            $limit = Yii::$app->getRequest()->getQueryParam('limit') ? Yii::$app->getRequest()->getQueryParam('limit') : 18;
            $where = [];
            if($city) {
                $where['city_id'] = $city;
            }
            if($country) {
                $where['country_id'] = $country;
            }

            $models = Webcam::find()
                ->where($where)
                ->limit($limit)
                ->all();

            return $this->render('index', [
                'models'=>$models,
                'limit' => $limit+18
            ]);
        }

        function actionShow($id) {
            $model = Webcam::findOne(['id'=>$id]);
            $city = Cities::findOne(['id'=>$model->city_id]);
            $country = Countries::findOne(['id'=>$model->country_id]);

            return $this->render('show', [
                'model'=>$model,
                'city'=>$city,
                'country'=>$country
            ]);
        }

        function actionGetcities() {
            $post = Yii::$app->request->post();
            $where = $post['id'] != -1 ? ['country_id'=>$post['id']] : [];
            $cities = Cities::find()->where($where)->all();

            return $this->renderAjax('citiesAjax', ['cities'=>$cities]);
        }

        function actionFind($title) {
            $where = [];
            $orWhere = [];

            if($title) {
                $where['title_ru']  = $title;
                $orWhere['description_ru'] = $title;
                $models = Webcam::find()->where(['like', 'title_ru', $title])->orWhere(['like','description_ru',$title])->all();
            } else {
                $models = Webcam::find()->all();
            }

            return $this->render('index', ['models'=>$models]);
        }

    }