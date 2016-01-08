<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ObjectCategory */

$this->title = 'Создать категорию объекта';
$this->params['breadcrumbs'][] = ['label' => 'Категории объектов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
