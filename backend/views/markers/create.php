<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Markers */

$this->title = 'Создать маркер';
$this->params['breadcrumbs'][] = ['label' => 'Маркеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="markers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
