<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Markers */

$this->title = 'Обновить маркер: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Маркеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="markers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
