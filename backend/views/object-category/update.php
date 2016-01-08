<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjectCategory */

$this->title = 'Обновить категорию: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Категории объектов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="object-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
