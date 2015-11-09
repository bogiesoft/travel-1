<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adv */

$this->title = 'Создать рекламный баннер';
$this->params['breadcrumbs'][] = ['label' => 'Рекламные баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
