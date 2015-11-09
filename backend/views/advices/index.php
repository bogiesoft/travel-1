<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdvicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Советы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advices-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать совет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'sub_title_ru',
            'show',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

</div>
