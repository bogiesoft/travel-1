<?php

namespace frontend\controllers;
use common\models\User;
use Yii;

class ForumController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index', [
        ]);
    }
}