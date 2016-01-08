<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $user common\models\User */

$this->title = $model->username;
$user = Yii::$app->user->identity;
$this->params['sidebarType'] = -1;
$this->params['fullLayout'] = true;

$forum_link = 'http://forum.travel.alltoall.info/';
$smiles_path = $forum_link.'images/smilies/';

if(/*$user->email_verification_status == User::EMAIL_NOT_VERIFIED*/0):?>
    <br>
    <p>
        <?php echo Yii::t('message','Вы не подтвердили свой e-mail. ')?>
        <a href="<?=Url::to('/user/get-verification-mail')?>"><?php echo Yii::t('messages','Выслать код еще раз')?></a>
    </p>
<?php endif?>

    <div class="personal-cabinet col-lg-10 col-md-12">
        <div class="container">
            <div class="main-content__heading">
                <h3 class="title">
                    Личный кабинет
                </h3>
            </div>  <!--main-content__heading-->
            <div class="row">
                <div class="personal-cabinet__block col-lg-6 col-md-6 ">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Ваши забронированные туры</p>
                        <a href="<?=Url::to('/user/tours')?>" class="common-button common-button--thin">Посмотреть все туры</a>
                    </div>
                    <ul class="reserved-tours list-unstyled">
                        <?php if($brones):
                        foreach($brones as $brone){ ?>
                        <li><i class=""><img src="<?=$brone->tour->getImage()->getUrl('40x40')?>" alt=""></i><p><?=Html::a($brone->tour->title_ru, '/tours/show/'.$brone->tour->id) ?></p></li>
                        <?php }
                        else:
                            echo '<li><p>У вас пока нет забронированых туров.</p></li>';
                        endif; ?>
                    </ul>
                    <a href="<?=Url::to('/user/tours')?>" class="common-button common-button--thin">Посмотреть все туры</a>
                </div>  <!--personal-cabinet__block-->

                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Личные данные</p>
                        <a href="<?=Url::to('/site/logout') ?>" class="common-button button-exit common-button--solid common-button--thin">Выход</a>
                        <a href="<?=Url::to('/site/additional') ?>" class="common-button common-button--thin"><i class="icon icon-pencil"></i>Редактировать данные</a>
                    </div>
                    <ul class="personal-data list-unstyled">
                        <li class="personal-data__name"><p><?=$userdata->firstname ? $userdata->firstname : '' ?> <?=$userdata->lastname ? $userdata->lastname : '' ?> <?=$userdata->fathername ? $userdata->fathername : '' ?> &nbsp;<span class="nikname">(<?=$model->username?>)</span></p></li>
                        <li><p><?php $date = DateTime::createFromFormat('Y-m-d', $userdata->birthday);
                                $formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
                                $formatter->setPattern('d MMMM Y');
                                echo $formatter->format($date); ?> &nbsp;<span class="age">(<?php $cur_year = date('Y'); echo $cur_year - $date->format('Y'); ?> лет)</span></p></li>
                        <li><p><span>Страна:</span><?=$userdata->country ? $userdata->country : 'Не задано' ?></p></li>
                        <li><p><span>Город:</span><?=$userdata->city ? $userdata->city : 'Не задано' ?></p></li>
                        <li><p><span>Телефон:</span><?=$userdata->phone ? $userdata->phone : 'Не задано' ?></p></li>
                        <li><p><span>Skype:</span><?=$userdata->skype ? $userdata->skype : 'Не задано' ?></p></li>
                        <li><p><span>E-mail:</span><?=$model->email ? $model->email : 'Не задано' ?></p></li>
                    </ul>
                    <a href="<?=Url::to('/site/additional') ?>" class="common-button common-button--thin"><i class="icon icon-pencil"></i>Редактировать данные</a>
                </div>  <!--personal-cabinet__block-->
            </div>  <!--row-->
            <div class="row">
                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Сообщения <span>форум</span></p>
                        <a href="<?=Url::to('/user/messages/')?>" class="common-button common-button--thin">Посмотреть все сообщения</a>
                    </div>
                    <div class="messages">
                        <?php if($messages):
                        foreach($messages as $message):
                            $time = new DateTime();
                            $time->createFromFormat('U', $message->post_time);
                            $t_string = $time->format('d.m.Y').'&nbsp;&nbsp;&nbsp;'.$time->format('H:i');
                            ?>
                        <div class="msg">
                            <div class="msg__info">
                                <p class="msg__theme"><?=$message->post_subject?></p>
                                <p class="msg__time"><?=$t_string?></p>
                            </div>
                            <p><?=\common\components\RoslPhpBbClass::fix_smiles($message->post_text, $smiles_path)?></p>
                        </div>  <!--msg-->
                        <?php endforeach;
                        endif; ?>
                    </div>  <!--messages-->
                    <a href="<?=Url::to('/user/messages/')?>" class="common-button common-button--thin">Посмотреть все сообщения</a>
                </div>  <!--personal-cabinet__block-->

                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Добавить свой тур</p>
                        <a href="<?=Url::to('/user/form/')?>" class="common-button common-button--solid common-button--thin">Отправить заявку на тур</a>
                    </div>
                    <div class="own-tour">
                        <p>Вы можете предложить свой тур!<br>
                            Вы провели незабываемое время в путешествии, заказав его в туристическом
                            агентстве, и хотите заказать его еще раз, только через наш портал ТурфирмНЕТ,
                            то Вы можете заполнить заявку, и мы рассмотрим Ваше предложение внести
                            данный тур в базу путешествий.<br>
                            Ваша заявка будет оправленна на рассмотрение.</p>
                    </div>
                    <a href="<?=Url::to('/user/form/')?>" class="common-button common-button--solid common-button--thin">Отправить заявку на тур</a>
                </div>  <!--personal-cabinet__block-->
            </div>  <!--row-->
        </div>
    </div>  <!--personal-cabinet-->

<style>
    i img {
        border-radius: 50%;
    }
</style>