<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Webcam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="webcam-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?php $image = $model->getImage(); ?>
        <?php if($image){ ?><img src="<?=$image->getUrl('x200')?>" alt=""><?php } ?>
    </div>

    <?= $form->field($model, 'code')->textarea(['rows' => 6]) ?>

    <?= Html::activeDropDownList($model, 'city_id', ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru')) ?>

    <?= Html::activeDropDownList($model, 'country_id', ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru')) ?>

    <?= $form->field($model, 'description_ru')->widget(CKEditor::className()) ?>

    <?= $form->field($model, 'timezone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size_width')->textInput() ?>

    <?= $form->field($model, 'size_height')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
