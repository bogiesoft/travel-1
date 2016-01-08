<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\RegisterForm */

$this->title = 'Профиль';
$this->params['sidebarType'] = -1;
$this->params['layoutClass'] = "personal-cabinet col-lg-10 col-md-12";

?>
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title text-left">
                    Профиль
                </h3>
            </div>  <!--main-content__heading-->
            <div class="profile">
                    <?php $form = ActiveForm::begin([
                        'id' => 'form-signup',
                        'options' => [
                            'enctype'=>'multipart/form-data',
                            'class'=>'profile__form',
                        ]
                    ]);
                    $model->user_id = (int)Yii::$app->user->id;
                    $model->can_moderate = 0;
                    $model->status = 1;
                    $tpl = "<div class=\"profile-input-group\">
                                                <p>{label}:</p>
                                                <div class=\"profile-input-group__field\">
                                                    {input}
                                                    <i class=\"icon icon-pencil\"></i>
                                                </div>
                                            </div>";
                    ?>
                    <div class="profile__avatar">
                        <div class="photo">
                            <img src="<?=$model->getImage() ? $model->getImage()->getUrl('151x151') : '' ?>" alt="">
                        </div>
                        <div class="identity">
                            <h3 class="title"><?=$model->firstname ? $model->firstname : '' ?> <?=$model->lastname ? $model->lastname : '' ?> <?=$model->fathername ? $model->fathername : '' ?></h3>
                            <div class="actions">
                                <label id="load-avatar" for="userdata-image" type="button" class="load-photo-button common-button common-button--thin"><i class="icon icon-photo-snap"></i>Загрузить</label>
                                <button id="change-password" type="button" class="change-pswd-button common-button common-button--thin"><i class="icon icon-key"></i>Сменить пароль</button>
                            <div class="hidden">
                                <?= $form->field($model, 'image')->fileInput()?>
                            </div>
                            </div>
                        </div>  <!--identity-->
                    </div>  <!--profile__avatar-->
                    <div class="row">
                        <div class="profile__block col-lg-6 col-md-6 col-sm-6">
                            <?= $form->field($model, 'firstname', [
                                        'template'=>$tpl
                                    ]) ?>
                            <?= $form->field($model, 'lastname', [
                                        'template'=>$tpl
                                    ]) ?>
                            <?= $form->field($model, 'fathername', [
                                        'template'=>$tpl
                                    ]) ?>
                        </div>  <!--profile__block-->
                        <div class="profile__block col-lg-6 col-md-6 col-sm-6">
                            <div class="profile-input-group">
                                <p>Логин:</p>
                                <div class="profile-input-group__field profile-input-group__field--login">
                                    <input type="text" disabled name="" value="<?=Yii::$app->user->identity->username;?>" placeholder="Логин">
                                    <i class="icon icon-pencil"></i>
                                </div>
                            </div>  <!--profile-input-group-->

                            <div class="profile-input-group rs-datepicker-outer">
                                <p>Дата рождения:</p>
                                <div class="profile-input-group__field" placeholder="Дата рождения">
                                    <!--<input type="text" id="birthday" placeholder="Страна">-->
                                    <?= $form->field($model, 'birthday')->widget(\kartik\date\DatePicker::className(), [
                                        'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
                                        'language' =>'ru',
                                        'readonly' => true,
                                        'removeButton'=>false,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose'=>true,
                                        ],
                                    ])->label(false) ?>
                                    <!--<i class="icon icon-pencil"></i>-->
                                </div>
                            </div>  <!--profile-input-group-->

                            <style>
                                .rs-datepicker-outer > p {
                                    top: 14px;
                                }
                                label {
                                    cursor: pointer;
                                }
                            </style>
                        </div>  <!--profile__block-->
                    </div>  <!--row-->
                    <div class="row">
                        <div class="profile__block profile__block--location col-lg-6 col-md-6 col-sm-12">
                            <?= $form->field($model, 'country', [
                                'template'=>$tpl
                            ]) ?>
                            <?= $form->field($model, 'city', [
                                'template'=>$tpl
                            ]) ?>
                            <?= $form->field($model, 'phone', [
                                'template'=>$tpl
                            ]) ?>
                            <?= $form->field($model, 'skype', [
                                'template'=>$tpl
                            ]) ?>
                            <?= $form->field($main_model, 'email', [
                                'template'=>$tpl
                            ]) ?>
                        </div>  <!--profile__block-->
                    </div>  <!--row-->
                <?= Html::submitInput('Сохранить', ['class' => 'common-button common-button--solid']) ?>
                <?php ActiveForm::end(); ?>

            </div>  <!--profile-->
        </div>  <!--row-->
    </div>
<br><br>
<style>
    .field-userdata-birthday {
        display: inline-block;
        position: absolute;
        right: 0;
        top: 0;
    }
    label#load-avatar {
        margin-bottom: 0;
        padding: 2px 0px;
    }
</style>