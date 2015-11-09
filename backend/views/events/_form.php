<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::activeDropDownList($model, 'country_id', ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru')) ?>
    </div>

    <?= $form->field($model, 'place_ru')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::activeDropDownList($model, 'event_category_id', ArrayHelper::map(\common\models\EventCategory::find()->all(), 'id', 'title_ru')) ?>
    </div>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::className(), [
        'dateFormat' => 'php:Y-m-d',
    ]) ?>

    <?=$form->field($model, 'images[]')->fileInput(['multiple'=> true]) ?>

    <div class="row images-preview">
        <?php $images = $model->getImages();
        foreach($images as $image) { ?>
            <?php if($image){ ?>
                <div class="col-lg-3 col-md-4 col-xs-6" data-image-id="<?=$image->id?>">
                    <img src="<?=$image->getUrl('300x150')?>" alt="">
                    <a href="" class="close-img"><i class="fa fa-close"></i></a>
                </div>
            <?php }
        }
        ?>
    </div>

    <?= $form->field($model, 'content_ru')->widget(\mihaildev\ckeditor\CKEditor::className()) ?>

    <?= $form->field($model, 'tickets_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <input type="hidden" name="imagesToDelete" id="imagesToDelete" value="">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
