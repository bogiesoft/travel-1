<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TourCategory */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории туров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
