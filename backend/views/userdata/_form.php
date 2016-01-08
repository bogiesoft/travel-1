<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Userdata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userdata-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= Html::activeDropDownList($model, 'user_id', \yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?php $image = $model->getImage(); ?>
        <?php if($image){ ?><img src="<?=$image->getUrl('x200')?>" alt=""><?php } ?>
    </div>

    <?= $form->field($model, 'fathername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::className()) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'can_moderate')->checkbox() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
