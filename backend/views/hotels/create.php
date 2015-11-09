<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hotels */

$this->title = 'Создать отель';
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
