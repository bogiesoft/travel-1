<?php
/**
 * Created by PhpStorm.
 * User: rosl
 * Date: 20.09.15
 * Time: 19:54
 */

namespace frontend\controllers;

use Yii;
use common\models\Cities;
use common\models\Countries;
use common\models\Markers;

class MapsController extends \yii\base\Controller
{
    public function actionIndex() {
        $cities = Cities::find()->all();
        $countries = Countries::find()->all();


        return $this->render('index', ['cities'=>$cities, 'countries'=>$countries]);
    }

    public function actionMarkers() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $markers = Markers::find()->all();

        foreach($markers as $key => $marker) {
            $coords = explode(',',$markers[$key]->latlng);
            $markers[$key]->latlng = [
                'latitude' => $coords[1],
                'longitude' => $coords[0]
            ];
            $markers[$key]->image = $markers[$key]->getImage()->getUrl('150x');
            $markers[$key]->content_ru = trim(htmlentities(strip_tags($markers[$key]->content_ru), ENT_QUOTES, 'UTF-8'));
        }

        return $markers;
    }

    public function actionLocations() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
            'countries' => \common\models\Countries::find()->all(),
            'cities' => \common\models\Cities::find()->all(),
        ];

        return $out;
    }
}