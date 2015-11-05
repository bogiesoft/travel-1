<?php
namespace frontend\controllers;
use common\controllers\MainController;
use common\models\Tours;
use frontend\filters\SiteLayout;
use yii\filters\AccessControl;

/**
 * Tours controller
 */
class ToursController extends MainController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors['layout'] =  ['class' => SiteLayout::className()];
        return $behaviors;
    }

    public function actionIndex()
    {
        $models = Tours::find()->where(['status'=>1])->orderBy('created_at DESC')->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionShow($id)
    {
        $model = Tours::findOne($id);

        return $this->render('show', ['model'=> $model]);
    }
}
