<?php

namespace backend\controllers;

use common\models\Hotels;
use moonland\phpexcel\Excel;
use Yii;
use common\models\ObjectCodes;
use backend\models\ObjectCodesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjectCodesController implements the CRUD actions for ObjectCodes model.
 */
class ObjectCodesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all ObjectCodes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectCodesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'models'=>ObjectCodes::find()->all(),
            'objects'=>Hotels::find()->all(),
        ]);
    }

    public function actionGetExcel() {
        $post = Yii::$app->request->post();

        $models = ObjectCodes::find();
        if(!empty($post['object'])):
            $models->where([
                'object_id'=>$post['object'],
            ]);
        endif;
        if(!empty($post['time_from'])):
            $models->andWhere([
                '>=', 'created_at', $post['time_from']
            ]);
        endif;
        if(!empty($post['time_to'])):
            $models->andWhere([
                '<=', 'created_at', $post['time_to']
            ]);
        endif;
        if(!empty($post['city'])):
            $models->andWhere([
                'city_id'=>$post['city']
            ]);
        endif;
        if(!empty($post['country'])):
            $models->andWhere([
                'country_id'=>$post['country']
            ]);
        endif;
        if(!empty($post['category'])):
            $models->andWhere([
                'object_category_id'=>$post['category']
            ]);
        endif;

        $models->all();

        Excel::export([
            'models' => $models,
            'columns'=> [
                'object.title_ru',
                'code',
                'tour.title_ru',
                'user.username',
                'created_at',
            ]
        ]);

        return true;
    }

    /**
     * Displays a single ObjectCodes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ObjectCodes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjectCodes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjectCodes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ObjectCodes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ObjectCodes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjectCodes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjectCodes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
