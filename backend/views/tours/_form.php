<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tours */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tours-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'support')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?php $image = $model->getImage(); ?>
        <?php if($image){ ?><img src="<?=$image->getUrl('x200')?>" alt=""><?php } ?>
    </div>

    <?= Html::activeDropDownList($model, 'country_id', \yii\helpers\ArrayHelper::map(\common\models\Countries::find()->all(), 'id', 'title_ru')) ?>

    <?= Html::activeDropDownList($model, 'city_id', \yii\helpers\ArrayHelper::map(\common\models\Cities::find()->all(), 'id', 'title_ru')) ?>

    <?php $model->user_id = (int)Yii::$app->user->id; ?>

    <?= $form->field($model, 'user_id')->textInput() ?>


    <?= $form->field($model, 'hotels')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Hotels::find()->all(), 'id', 'title_ru'), ['multiple' => true]) ?>

    <?php $model->status = true; ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
