<?php
namespace frontend\controllers;
use \common\models\Webcam;

    class WebcamsController extends \yii\web\Controller {
        function actionIndex() {
            $models = Webcam::find()->all();

            return $this->render('index', ['models'=>$models]);
        }

        function actionShow($id) {
            $model = Webcam::findOne(['id'=>$id]);

            return $this->render('show', ['model'=>$model]);
        }

    }