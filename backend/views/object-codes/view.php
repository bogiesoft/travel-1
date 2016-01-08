<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ObjectCodes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Коды объектов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-codes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'object_id',
            'code',
            'tour_id',
            'created_at',
        ],
    ]) ?>

</div>
