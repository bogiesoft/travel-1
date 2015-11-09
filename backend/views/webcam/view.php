<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Webcam */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вебкамеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcam-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_ru',
            'image',
            'code:ntext',
            'city_id',
            'country_id',
            'description_ru:ntext',
            'timezone',
            'size_width',
            'size_height',
        ],
    ]) ?>

</div>
