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

    public function actionCategory($id) {
        $models = Tours::find()->joinWith('categories')
            ->where(['tours.status'=>1])
            ->andWhere(['tour_to_category.category_id'=>$id])->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionCity($id) {
        $models = Tours::find()->joinWith('cities')
            ->where(['tours.status'=>1])
            ->andWhere(['tour_to_city.city_id'=>$id])->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionParams($city = 0, $category = 0, $days = '0:-', $people = '0:-', $timing = '0:-') {
        $models = Tours::find()
            ->joinWith('cities')
            ->joinWith('categories')
            ->where(['tours.status' => 1])
            ->andWhere(['tour_to_city.city_id'=>$city])
            ->andWhere(['tour_to_category.category_id'=>$category])
            ->andWhere(['dayscount > 2'])->all();

        var_dump($models);die;

    }
}
