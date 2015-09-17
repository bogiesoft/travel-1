<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Advices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'excerpt_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_content_ru')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'show')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
