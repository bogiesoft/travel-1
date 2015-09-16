<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Countries;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Cities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->widget(CKEditor::className()) ?>

    <?= Html::activeDropDownList($model, 'country_id', ArrayHelper::map(Countries::find()->all(), 'id', 'title_ru')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
