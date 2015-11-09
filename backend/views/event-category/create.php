<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EventCategory */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории мероприятий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
