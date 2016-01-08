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
if(/*$user->email_verification_status == User::EMAIL_NOT_VERIFIED*/0):?>
    <br>
    <p>
        <?php echo Yii::t('message','Вы не подтвердили свой e-mail. ')?>
        <a href="<?=Url::to('/user/get-verification-mail')?>"><?php echo Yii::t('messages','Выслать код еще раз')?></a>
    </p>
<?php endif?>
<div class="user-view">

    <h1 class="text-center"><?=$userdata ? Html::encode($userdata->firstname.' '.$userdata->lastname):''?></h1>

    <div class="row">
        <div class="col-md-3 text-right"><img src="<?=$userdata->getImage() ? $userdata->getImage()->getUrl('150x200'):'' ?>" alt=""></div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4><?=Html::encode($model->email)?> (<?=Html::encode($model->username)?>)</h4>
                </div>
                <div class="col-md-12">
                    <h5><?=$userdata ? Html::encode($userdata->country):''?>, <?=$userdata ? Html::encode($userdata->city):''?></h5>
                </div>
                <div class="col-md-12">
                    <?php if($userdata): ?><h5>Возможность предложить тур: <?=$userdata->can_moderate ? 'Да' : 'Нет'?></h5><?php endif; ?>
                </div>
                <div class="col-md-12">
                    <?=Html::a('Изменить информацию', '/site/additional')?>
                </div>
            </div>
        </div>
        <div class="col-md-11 pull-right">
            <br><br>
            <?php if($brones){ ?>
                <h4>Недавно забронировано:</h4>
                <table class="table table-condensed brones-table">
                    <thead>
                    <tr>
                        <th>Объект</th>
                        <th>Тур</th>
                        <th>Дата</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($brones as $brone){ ?>
                        <tr>
                            <td><?=$brone->object->title_ru ?></td>
                            <td><?=Html::a($brone->tour->title_ru, '/tours/show/'.$brone->tour->id) ?></td>
                            <td><?=$brone->created_at ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>


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
                        <a href="#" class="common-button common-button--thin">Посмотреть все туры</a>
                    </div>
                    <ul class="reserved-tours list-unstyled">
                        <?php foreach($brones as $brone){ ?>
                        <li><i class=""><img src="<?=$brone->tour->getImage()->getUrl('40x40')?>" alt=""></i><p><?=Html::a($brone->tour->title_ru, '/tours/show/'.$brone->tour->id) ?></p></li>
                        <?php } ?>
                    </ul>
                    <a href="#" class="common-button common-button--thin">Посмотреть все туры</a>
                </div>  <!--personal-cabinet__block-->

                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Личные данные</p>
                        <a href="#" class="common-button button-exit common-button--solid common-button--thin">Выход</a>
                        <a href="#" class="common-button common-button--thin"><i class="icon icon-pencil"></i>Редактировать данные</a>
                    </div>
                    <ul class="personal-data list-unstyled">
                        <li class="personal-data__name"><p>Анастасия Журавлева Леонидовна &nbsp;<span class="nikname">(Anastasia_J)</span></p></li>
                        <li><p>3 сентября 1986 &nbsp;<span class="age">(29 лет)</span></p></li>
                        <li><p><span>Страна:</span>Россия</p></li>
                        <li><p><span>Город:</span>Санкт-Петербург</p></li>
                        <li><p><span>Телефон:</span>+7 (900) 444 66 66</p></li>
                        <li><p><span>Skype:</span>Anastasia_J</p></li>
                        <li><p><span>E-mail:</span>Anastasia_J@mail.ru</p></li>
                    </ul>
                    <a href="#" class="common-button common-button--thin"><i class="icon icon-pencil"></i>Редактировать данные</a>
                </div>  <!--personal-cabinet__block-->
            </div>  <!--row-->
            <div class="row">
                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Сообщения <span>форум</span></p>
                        <a href="#" class="common-button common-button--thin">Посмотреть все сообщения</a>
                    </div>
                    <div class="messages">
                        <div class="msg">
                            <div class="msg__info">
                                <p class="msg__theme">Страны, города, отели</p>
                                <p class="msg__time">26.08.11&nbsp;&nbsp;&nbsp;18:09</p>
                            </div>
                            <p>Обсуждаем отдых в Беларуси. Гостиницы, дома отдыха, санатории и пансионаты
                                Беларуси. Активный отдых - охота, рыбалка, походы, самостоятельный туризм.
                                Оздоровительные туры. Недорогой отдых в Беларуси и роскошный. Автопутешествия.
                                Цены на гостиницы Беларуси. Достопримечательности Беларуси. Экскурсионные
                                программы - Минск, Витебск, Полоцк, Беловежская Пуща и многие другие вопросы</p>
                        </div>  <!--msg-->
                        <div class="msg">
                            <div class="msg__info">
                                <p class="msg__theme">Юридические вопросы турбизнеса</p>
                                <p class="msg__time">26.08.11&nbsp;&nbsp;&nbsp;18:09</p>
                            </div>
                            <p>Вопросы организации турбизнеса, взаимоотношений сторон и т д. Правовая поддержка
                                туристического бизнеса, а также обсуждение вопросов совершенствования
                                законодательства, регулирующего туристическую деятельность</p>
                        </div>  <!--msg-->
                        <div class="msg">
                            <div class="msg__info">
                                <p class="msg__theme">Ж/Д транспорт, маршруты, билеты</p>
                                <p class="msg__time">26.08.11&nbsp;&nbsp;&nbsp;18:09</p>
                            </div>
                            <p>Обсуждаем пассажирские железнодорожные перевозки: ж/д вокзалы, расписания
                                поездов, наличие мест, время в пути, вагоны, ж/д билеты. Системы онлайн
                                бронирования и оплаты железнодорожных билетов. Ищем и предлагаем помощь в
                                поиске маршрутов для путешествия на поездах, информации о ценах на ж.д билеты,
                                пересадки и системы скидок. Советы туристов о путешествии поездами.</p>
                        </div>  <!--msg-->
                        <div class="msg">
                            <div class="msg__info">
                                <p class="msg__theme">Юридические вопросы турбизнеса</p>
                                <p class="msg__time">26.08.11&nbsp;&nbsp;&nbsp;18:09</p>
                            </div>
                            <p>Вопросы организации турбизнеса, взаимоотношений сторон и т д. Правовая поддержка
                                туристического бизнеса, а также обсуждение вопросов совершенствования законодательства,
                                регулирующего туристическую деятельность</p>
                        </div>  <!--msg-->
                    </div>  <!--messages-->
                    <a href="#" class="common-button common-button--thin">Посмотреть все сообщения</a>
                </div>  <!--personal-cabinet__block-->

                <div class="personal-cabinet__block col-lg-6 col-md-6">
                    <div class="personal-cabinet__block__heading clearfix">
                        <p class="title">Добавить свой тур</p>
                        <a href="#" class="common-button common-button--solid common-button--thin">Отправить заявку на тур</a>
                    </div>
                    <div class="own-tour">
                        <p>Вы можете предложить свой тур!<br>
                            Вы провели незабываемое время в путешествии, заказав его в туристическом
                            агентстве, и хотите заказать его еще раз, только через наш портал ТурфирмНЕТ,
                            то Вы можете заполнить заявку, и мы рассмотрим Ваше предложение внести
                            данный тур в базу путешествий.<br>
                            Ваша заявка будет оправленна на рассмотрение.</p>
                    </div>
                    <a href="#" class="common-button common-button--solid common-button--thin">Отправить заявку на тур</a>
                </div>  <!--personal-cabinet__block-->
            </div>  <!--row-->
        </div>
    </div>  <!--personal-cabinet-->