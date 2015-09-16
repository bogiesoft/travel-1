<?php
/*
 * $types: 0 - webcameras
 * */
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Cities;
use common\models\Countries;
use yii\helpers\RoslArrayHelper;
use yii\helpers\ArrayHelper;

class LeftSidebar extends Widget {
    public $type = 0;

    function run() {
        $countries = Countries::find()->all();
        $cities = Cities::find()->all();

        $arrayCountries = RoslArrayHelper::arraySingle(ArrayHelper::map($countries, 'id', 'title_ru'));
        $arrayCities = RoslArrayHelper::arraySingle(ArrayHelper::map($cities, 'id', 'title_ru'));
        $array = ArrayHelper::merge($arrayCities, $arrayCountries);

        switch($this->type):
            case 0:
                return $this->render('leftsidebar', ['cities'=>$cities,'countries'=>$countries, 'source'=>$array]);
                break;
            case 1:
                return $this->render('leftsidebar-type1', ['cities'=>$cities,'countries'=>$countries, 'source'=>$array]);
                break;
        endswitch;
    }
}
