<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Отели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotels-view">

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
            'description_ru:ntext',
            'place_ru:ntext',
            'way_ru:ntext',
            'discount',
            'link',
        ],
    ]) ?>

</div>
