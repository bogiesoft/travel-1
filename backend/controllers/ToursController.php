<?php

namespace backend\controllers;

use yii\db\mysql\QueryBuilder;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;
use Yii;
use common\models\Tours;
use backend\models\ToursSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ToursController implements the CRUD actions for Tours model.
 */
class ToursController extends Controller
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
     * Lists all Tours models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ToursSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tours model.
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
     * Creates a new Tours model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tours();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();
            $this->saveRelations($post['Tours'], $model->id);

            $images = UploadedFile::getInstances($model, 'image');

            foreach($images as $image) {
                $path = Yii::getAlias('@webroot/images/store/').$image->baseName.'.'.$image->extension;
                $image->saveAs($path);
                $model->attachImage($path, true);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tours model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $post = Yii::$app->request->post();
            $this->saveRelations($post['Tours'], $id);

            $images = UploadedFile::getInstances($model, 'image');

            $post = Yii::$app->request->post();

            $imagesToDelete = explode(',',$post['imagesToDelete']);

            if($imagesToDelete) {
                foreach($imagesToDelete as $id) {
                    if(!is_null($model->getImage())) {
                        $img = $model->getImage()->findOne($id);
                        if(!is_null($img)){
                            $model->removeImage($img);
                        }
                    }
                }
            }

            foreach($images as $image) {
                $path = Yii::getAlias('@webroot/images/store/').$image->baseName.'.'.$image->extension;
                $image->saveAs($path);
                $model->attachImage($path, true);
            }

            $pdf = UploadedFile::getInstance($model, 'pdf');
            if($pdf) {
                $path = Yii::getAlias('@frontend/web/pdf/').$pdf->baseName.'.'.$pdf->extension;
                $pdf->saveAs($path);
                $model->pdf = '/pdf/'.$pdf->baseName.'.'.$pdf->extension;
                $model->save();
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tours model.
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
     * Finds the Tours model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tours the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tours::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetDay() {
        $data = Yii::$app->request->post();

        return $this->renderAjax('ajax/day', ['data'=>$data]);
    }

    public function actionGetElement() {
        $data = Yii::$app->request->post();

        return $this->renderAjax('ajax/element', ['data'=>$data]);
    }

    public function actionGetVariant() {
        $data = Yii::$app->request->post();

        return $this->renderAjax('ajax/variant', ['data'=>$data]);
    }

    public function actionGetField() {
        $data = Yii::$app->request->post();

        return $this->renderAjax('ajax/field', ['data'=>$data]);
    }

    public function saveRelations($data, $tour_id) {
        $db = Yii::$app->db;

        if(empty($data['days'])) {
            return;
        }

        $db->createCommand("DELETE FROM tour_day WHERE tour_id = {$tour_id}")->execute();
        $db->createCommand("DELETE FROM day_schedule WHERE tour_id = {$tour_id}")->execute();
        $db->createCommand("DELETE FROM schedule_variant WHERE tour_id = {$tour_id}")->execute();
        $db->createCommand("DELETE FROM fields_to_hide WHERE tour_id = {$tour_id}")->execute();

        foreach($data['days'] as $day) {
            $db->createCommand("INSERT INTO tour_day SET tour_id = {$tour_id}")->execute();
            $day_id = $db->getLastInsertID();
            foreach($day['schedule'] as $schedule) {
                $db->createCommand("INSERT INTO day_schedule SET day_id = {$day_id}, tour_id = {$tour_id}")->execute();
                $schedule_id = $db->getLastInsertID();
                foreach($schedule['variants'] as $variant) {
                    $db->createCommand("INSERT INTO schedule_variant
                    SET item_id = {$schedule_id},
                    tour_id = {$tour_id},
                    label = '{$variant['label']}',
                    header = \"{$variant['header']}\",
                    datetime = '{$variant['datetime']}',
                    object_id = {$variant['object_id']}")->execute();

                    if(!empty($variant['hide_fields'])) {
                        foreach($variant['hide_fields'] as $field_id) {
                            $db->createCommand("INSERT INTO fields_to_hide
                            SET object_field_id = {$field_id},
                            tour_id = {$tour_id},
                            object_id = {$variant['object_id']}")->execute();
                        }
                    }


                    /*$variant_id = $db->getLastInsertID();
                    foreach($variant['fields'] as $field) {
                        $db->createCommand()->insert('variant_field', [
                           'variant_id' => $variant_id,
                            'tour_id' => $tour_id,
                            'type_id' => $field['type_id'],
                            'content' => $field['value']
                        ])->execute();
                        //$db->prepare("INSERT INTO variant_field SET variant_id = {$variant_id}, tour_id = {$tour_id}, type_id = {$field['type_id']}, content = '{$field['value']}'")->execute();
                    }*/
                }
            }
        }

        return $data;
    }

    public function actionEditorByType(){
        $post = Yii::$app->request->post();

        return $this->renderAjax('ajax/editor-by-type', ['data'=>$post]);
    }

    public function actionHideFields(){
        $post = Yii::$app->request->post();

        return $this->renderAjax('ajax/hide-fields', ['data'=>$post]);
    }

}
