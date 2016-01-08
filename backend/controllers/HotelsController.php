<?php

namespace backend\controllers;

use Yii;
use common\models\Hotels;
use backend\models\HotelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelsController implements the CRUD actions for Hotels model.
 */
class HotelsController extends Controller
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

    /**
     * Lists all Hotels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hotels model.
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
     * Creates a new Hotels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hotels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            if(!empty($post['Hotels'])) {
                $this->saveRelations($post['Hotels'], $model->id);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hotels model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            $this->saveRelations($post['Hotels'], $id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hotels model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetField() {
        $data = Yii::$app->request->post();

        return $this->renderAjax('ajax/field', ['data'=>$data]);
    }

    public function saveRelations($data, $object_id) {
        $db = Yii::$app->db;

        $db->createCommand("DELETE FROM object_field WHERE object_id = {$object_id}")->execute();

        if(!empty($data['fields'])):
            foreach($data['fields'] as $field) {
                $db->createCommand()->insert('object_field', [
                    'object_id' => $object_id,
                    'type_id' => $field['type_id'],
                    'content' => $field['value']
                ])->execute();
            }
        endif;

        return $data;
    }

    /**
     * Finds the Hotels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hotels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hotels::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
