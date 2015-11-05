<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TourCategory */

$this->title = 'Create Tour Category';
$this->params['breadcrumbs'][] = ['label' => 'Tour Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
