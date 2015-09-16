<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Webcam */

$this->title = 'Create Webcam';
$this->params['breadcrumbs'][] = ['label' => 'Webcams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webcam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
