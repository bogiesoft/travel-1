<?php
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\components\RoslPhpBbClass;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $user common\models\User */

$this->title = "Добавить свой тур";
$user = Yii::$app->user->identity;
$this->params['sidebarType'] = -1;
$this->params['fullLayout'] = true;
?>

<div class="personal-cabinet col-lg-10 col-md-12">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title text-left zag">
                    <?=$this->title?>
                </h3>
            </div>  <!--main-content__heading-->
            <div class="add_tour">
                <div class="text_block">
                    Вы можете предложить свой тур!
                    Вы провели незабываемое время в путешествии, заказав его в туристическом агентстве, и хотите заказать его еще раз, только через наш портал ТурфирмНЕТ, то Вы можете заполнить заявку, и мы рассмотрим Ваше предложение внести данный тур в базу путешествий. Ваша заявка будет оправленна на рассмотрение.
                </div>
                <div class="form_add_tour">
                    <form class="profile__form" method="post" action="" id="add_tour_form">
                        <div class="zag_form">Форма заявки </div>
                        <div class="row">
                            <div class="form_bl col-lg-6 col-md-6 col-sm-6">
                                <div class="addtour-input-group">
                                    <p>Ваша фамилия:</p>
                                    <div class="profile-input-group__field">
                                        <input type="text" name="surname" placeholder="Ваша фамилия">
                                    </div>
                                </div>  <!--addtour-input-group-->
                                <div class="addtour-input-group">
                                    <p>Ваше имя:</p>
                                    <div class="profile-input-group__field">
                                        <input type="text" name="firstname" placeholder="Ваше имя">
                                    </div>
                                </div>  <!--addtour-input-group-->
                            </div>  <!--profile__block-->
                            <div class=" col-lg-6 col-md-6 col-sm-6">
                                <div class="addtour-input-group">
                                    <p>Ваш e-mail:</p>
                                    <div class="profile-input-group__field">
                                        <input type="text" name="email" placeholder="Ваш e-mail">
                                    </div>
                                </div>  <!--addtour-input-group-->
                                <div class="addtour-input-group">
                                    <p>Ваш телефон:</p>
                                    <div class="profile-input-group__field">
                                        <input type="text" name="phone" placeholder="Ваш телефон">
                                    </div>
                                </div>  <!--addtour-input-group-->
                            </div>  <!--profile__block-->
                            <div class="full_width col-lg-6 col-md-6 col-sm-6">
                                <div class="addtour-input-group">
                                    <p>Название тура:</p>
                                    <div class="profile-input-group__field">
                                        <input type="text" name="nametour" placeholder="Название тура">
                                    </div>
                                </div>
                            </div>
                            <div class="full_width col-lg-6 col-md-6 col-sm-6">
                                <div class="addtour-input-group tourtext">
                                    <p>Описание:</p>
                                    <div class="profile-input-group__field">
                                        <textarea name="texttour" placeholder="Описание тура"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>  <!--row-->
                        <div class="btn_form">
                            <input type="submit" class="common-button common-button--solid addbtn" value="Отправить заявку на тур">                                    								</div>
                    </form>
                </div>
            </div>
            <!--add_tour-->
        </div>  <!--row-->
    </div>
</div>  <!--personal-cabinet-->