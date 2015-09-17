<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdvicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'main_title_ru') ?>

    <?= $form->field($model, 'sub_title_ru') ?>

    <?= $form->field($model, 'excerpt_ru') ?>

    <?= $form->field($model, 'full_content_ru') ?>

    <?php // echo $form->field($model, 'show') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
