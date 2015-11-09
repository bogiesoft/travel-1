<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adv */

$this->title = 'Обновить рекламный баннер: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Рекламные баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="adv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
