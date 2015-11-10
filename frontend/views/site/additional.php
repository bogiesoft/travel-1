<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\RegisterForm */

$this->title = 'Дополнительная информация';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="consultations">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=Html::encode($this->title)?>
                </h3>
            </div>  <!--main-content__heading-->
            <div class="consultations__block col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']);
                $model->user_id = $id;
                $model->can_moderate = 0; ?>

                <?= $form->field($model, 'firstname') ?>
                <?= $form->field($model, 'lastname') ?>
                <?= $form->field($model, 'country') ?>
                <?= $form->field($model, 'city') ?>
                <?= $form->field($model, 'image')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app','Сохранить'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>  <!--consultations__block-->
        </div>
    </div>
</div>  <!--web-cams-page-->
