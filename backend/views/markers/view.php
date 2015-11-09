<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Markers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Маркеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markers-view">

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
            'country',
            'city',
            'content_ru:ntext',
            'image',
            'latlng',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
