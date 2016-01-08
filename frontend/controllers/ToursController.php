<?php
namespace frontend\controllers;
use common\controllers\MainController;
use common\models\Cities;
use common\models\Countries;
use common\models\Hotels;
use common\models\ObjectCategory;
use common\models\ObjectCodes;
use common\models\Tours;
use frontend\filters\SiteLayout;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

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

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $get = \Yii::$app->request->get();
        $search = [];
        if(!empty($get['search'])) {
           $search = ['LIKE','tours.title_ru', $get['search']];
        }

            $days_min = ['>=', 'count(*)', !empty($get['days_min']) ? $get['days_min'] : 0];
            $days_max = ['<=', 'count(*)', !empty($get['days_max']) ? $get['days_max'] : 999];

            $days_query = Tours::find()
                ->joinWith('days')
                ->groupBy('tour_day.tour_id')
                ->having($days_min)
                ->andHaving($days_max)
                ->orderBy('tours.created_at DESC')
                ->asArray()
                ->all();

            $days = ArrayHelper::map($days_query, 'id', 'id');


        $category = !empty($get['category']) ? ['tour_to_category.category_id'=>$get['category']] : [];
        if(!empty($get['city'])) {
            if(is_string($get['city'])){
                $city = Cities::find()->where(['like', 'title_ru', $get['city']])->one();

                $get['city'] = $city ? $city->id : 0;
            }
        }
        $city = !empty($get['city']) ? ['tour_to_city.city_id'=>$get['city']] : [];

        $limit = !empty($get['limit']) ? $get['limit'] : 20;


        $models = Tours::find()
            ->joinWith('categories')
            ->joinWith('cities')
            ->joinWith('days')
            ->where(['tours.status'=>1])
            ->andWhere($search)
            ->andWhere($category)
            ->andWhere($city)
            ->andWhere(['in','tours.id', $days])
            ->orderBy('tours.created_at DESC')
            ->limit($limit)
            ->all();

        return $this->render('index', [
            'models'=> $models,
            'limit'=>$limit+20
        ]);
    }

    public function actionShow($id)
    {
        $model = Tours::findOne($id);
        $object_categories = ObjectCategory::find()->where(['status'=>1])->all();
        $open_modal =  \Yii::$app->getRequest()->getQueryParam('openmodal');
        $codes = \Yii::$app->user->identity ? ObjectCodes::find()->where([
            'user_id' => \Yii::$app->user->id,
            'tour_id' => $id
        ])->groupBy(['object_id'])->all() : [];

        return $this->render('show', [
            'model'=> $model,
            'open_modal'=>$open_modal,
            'object_categories'=>$object_categories,
            'codes'=>$codes
        ]);
    }

    public function actionCategory($id) {
        $models = Tours::find()->joinWith('categories')
            ->where(['tours.status'=>1])
            ->andWhere(['tour_to_category.category_id'=>$id])->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionCountry($id) {
        $cities = Cities::find()->where(['country_id'=>$id])->all();

        $cities_id = ArrayHelper::map($cities, 'id', 'id');

        $models = Tours::find()->joinWith('cities')
            ->where(['tours.status'=>1])
            ->andWhere(['in', 'tour_to_city.city_id', $cities_id])->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionCity($id) {
        $models = Tours::find()->joinWith('cities')
            ->where(['tours.status'=>1])
            ->andWhere(['tour_to_city.city_id'=>$id])->all();

        return $this->render('index', ['models'=> $models]);
    }

    public function actionObjectsByCategory(){
        $post = \Yii::$app->request->post();
        $models = Hotels::find()->joinWith('categories')
            ->joinWith('tours')
            ->where(['tour_to_hotel.tour_id'=>$post['tour_id']])
            ->andWhere(['object_to_category.category_id'=>$post['object_category']])
            ->all();
        //var_dump($models);
        return $this->renderAjax('ajax/objects-select', ['hotels'=>$models]);
    }

    public function actionSaveCode() {
        $post = \Yii::$app->request->post();
        $data = [];
        parse_str($post['data'], $data);
        $model = new ObjectCodes();
        if($post) {
            $model->tour_id = $data['tour_id'];
            $model->object_id = $data['object_id'];
            $model->code = $data['code'];
            $model->object_category_id = $data['object_category_id'];
            $model->user_id = $data['user_id'];
            $model->city_id = $post['city_id'];
            $model->country_id = $post['country_id'];
            $model->load($post);

            var_dump($model->save());

            return;
        }
    }

}
