<?php
/*
 * $types: -1 - no sidebar, 0 - webcameras, 1 - tours filter, 2 - events filter
 * */
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Cities;
use common\models\Countries;
use yii\helpers\RoslArrayHelper;
use yii\helpers\ArrayHelper;

class LeftSidebar extends Widget {
    public $type = 0;
    public $isMobile = false;

    function run() {
        $countries = Countries::find()->all();
        switch($this->type):
            case 0:
                $cities = Cities::find()->all();

                $arrayCountries = RoslArrayHelper::arraySingle(ArrayHelper::map($countries, 'id', 'title_ru'));
                $arrayCities = RoslArrayHelper::arraySingle(ArrayHelper::map($cities, 'id', 'title_ru'));
                $array = ArrayHelper::merge($arrayCities, $arrayCountries);

                return !$this->isMobile ? $this->render('leftsidebar', ['cities'=>$cities, 'countries'=>$countries, 'source'=>$array]) : $this->render('leftsidebar-mobile', ['cities'=>$cities, 'countries'=>$countries, 'source'=>$array]);
                break;
            case 1:
                $countries = Countries::find()->all();
                return !$this->isMobile ? $this->render('leftsidebar-type1',['countries'=>$countries]) : $this->render('leftsidebar-type1-mobile',['countries'=>$countries]);
                break;
        endswitch;
    }
}
