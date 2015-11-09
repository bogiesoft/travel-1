<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Advices */

$this->title = 'Создать совет';
$this->params['breadcrumbs'][] = ['label' => 'Советы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
