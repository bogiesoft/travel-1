<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarkersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Маркеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Markers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'title_ru',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

</div>
