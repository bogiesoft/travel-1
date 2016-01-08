<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ObjectCodes */

$this->title = 'Update Object Codes: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Object Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="object-codes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
