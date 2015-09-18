<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Вход';
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
                <?php $form = ActiveForm::begin(['id' => 'login-form',
                    'action'=>Url::to(['site/login']),
                ]); ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>  <!--consultations__block-->
        </div>
    </div>
</div>  <!--web-cams-page-->