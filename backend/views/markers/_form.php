<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Markers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="markers-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= Html::activeDropDownList($model, 'city', ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru')) ?>

    <?= Html::activeDropDownList($model, 'country', ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru')) ?>

    <?= $form->field($model, 'content_ru')->widget(\mihaildev\ckeditor\CKEditor::className()) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <div class="form-group">
        <?php $image = $model->getImage(); ?>
        <?php if($image){ ?><img src="<?=$image->getUrl('x200')?>" alt=""><?php } ?>
    </div>

    <?= $form->field($model, 'latlng')->widget('kolyunya\yii2\widgets\MapInputWidget',
        ['pattern'=>'%longitude%,%latitude%']
    ); ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
