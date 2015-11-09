<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Advices */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Советы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advices-view">

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
            'main_title_ru',
            'sub_title_ru',
            'excerpt_ru:ntext',
            'full_content_ru:ntext',
            'show',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
