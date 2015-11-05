<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Events;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Reviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::activeDropDownList($model, 'model', [
        'Events' => 'Events'
    ]) ?>

    <?= Html::activeDropDownList($model, 'item_id', ArrayHelper::map(\common\models\Events::find()->all(), 'id', 'title_ru')) ?>

    <?= Html::activeDropDownList($model, 'user_id', ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_ru')->widget(\mihaildev\ckeditor\CKEditor::className()) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
