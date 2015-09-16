<?php

namespace frontend\widgets;

use yii\base\Widget;
use common\models\Webcam;

class CityCameras extends Widget {

    public $currentCamId = 0;

    public $cityId = 0;

    function run() {
        if(!$this->cityId) return false;

        $models = Webcam::find()->where(['not',['id'=>$this->currentCamId]])->andWhere(['city_id'=>$this->cityId])->all();

        return $this->render('citycameras',compact('models'));
    }
}
