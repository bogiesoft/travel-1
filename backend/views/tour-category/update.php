<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TourCategory */

$this->title = 'Обновить категорию: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Категории туров', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="tour-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
