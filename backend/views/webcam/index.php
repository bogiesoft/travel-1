<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WebcamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Webcams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcam-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Webcam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ru',
            'image',
            'code:ntext',
            'city_ru',
            // 'country_ru',
            // 'description_ru:ntext',
            // 'timezone',
            // 'size_width',
            // 'size_height',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
