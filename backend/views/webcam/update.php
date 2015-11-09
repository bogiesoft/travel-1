<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Webcam */

$this->title = 'Обновить вебкамеру: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вебкамеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="webcam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
