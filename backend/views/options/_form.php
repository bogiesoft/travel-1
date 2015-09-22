<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Options */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="options-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if($model->type == 2) { ?>
        <?=$form->field($model, 'value')->fileInput()?>
    <?php } elseif($model->type == 1) { ?>
        <?=$form->field($model, 'value')->widget(\mihaildev\ckeditor\CKEditor::className())?>
    <?php } else { ?>
        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::activeDropDownList($model, 'type', ['string', 'CKE', 'image']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
