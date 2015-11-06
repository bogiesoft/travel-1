<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\controllers\SiteController;

$this->title = $model->title_ru;
$this->params['sidebarType'] = 3;
$this->params['tour-view'] = true;
?>
<style>
    .schedule .panel-heading a {
        height: auto;
    }
</style>
<div class="breadcrumb clearfix">
    <li><a href="#"></a></li>
</div>

    <div class="tour-legend-page">
        <div class="container">
            <div class="row">
                <div class="main-content__heading text-uppercase">
                    <h3 class="title text-left">
                        легенда ТУРА: <span><?=Html::encode($model->title_ru)?></span>
                    </h3>
                </div>  <!--main-content__heading-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="location">
                        <p><?=Html::encode($model->city->title_ru)?></p>
                    </div>
                    <section class="event-slider">
                        <ul id="image-gallery" class="without-thumbs gallery list-unstyled cS-hidden">
                            <li>
                                <img src="<?=$model->getImage()->getUrl('400x260')?>" />
                            </li><!--
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>
                            <li>
                                <img src="assets/img/tour_legend_img1.jpg" />
                            </li>-->
                        </ul>
                    </section>  <!--event-slider-->
                    <div class="tour-details">
                        <ul class="list-unstyled">
                            <li><p><span>Автор:</span> <?=Html::encode($model->userdata->firstname)?> <?=Html::encode($model->userdata->lastname)?></p></li>
                            <li><p><span>При поддержке:</span> <?=Html::encode($model->support)?>  </p></li>
                            <li><p><span>Категории:</span> <?=implode(', ', \yii\helpers\ArrayHelper::map($model->categories, 'id', 'title_ru'))?></p></li>
                            <li><p><span>Длительность:</span> 2 дня /3 ночи</p></li>

                        </ul>
                    </div>  <!--tour-details-->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="select-day nav nav-tabs">
                        <li class="active"><a href="#day1" data-toggle="tab">День 1</a></li>
                        <li><a href="#day2" data-toggle="tab">День 2</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="day1"><p>
                            <div class="schedule">
                                <div class="panel-group" id="tour-legend" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab1">
                                            <a role="button" data-toggle="collapse" data-parent="#tab1" href="#tab1-collapse" aria-expanded="true" aria-controls="tab1-collapse">
                                                <div class="schedule__point">
                                                    <p><b>Как добраться?</b></p>
                                                </div>
                                                <i class="icon icon-train"></i>
                                                <h4 class="panel-title">
                                                    Прибытие на Московский вокзал<br class="hidden-md hidden-lg hidden-xs"> ранним утром.
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab1-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab1">
                                            <div class="panel-body">
                                                <p>Из Москвы мы рекомендуем носные поезда с прибытием на Московский вокзал.<br>
                                                    Не нужно боятся того что поезд прибывает рано утром и метро еще не работает это прекрасная возможность совершить прогулку по Невскому проспекту от вокзала до места начала экскурсии одновременно выделив время на завтрак.</p>
                                                <p><br></p>
                                                <p><b>Ночь 1 пятница-суббота - в пути.</b></p>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab2">
                                            <a role="button" data-toggle="collapse" data-parent="#tab2" href="#tab2-collapse" aria-expanded="true" aria-controls="tab1-collapse">
                                                <div class="schedule__point">
                                                    <p><b>Завтрак</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    Завтрак в ресторане “Щелкунчик”
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab2-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab2">
                                            <div class="panel-body schedule__place">
                                                <div class="schedule__place__services">
                                                    <p class="tour-legend-details single-on-top">
                                                        <i class="icon icon-link"></i>
                                                        <a href="http://www.schelkunchik.spb.ru/">http://www.schelkunchik.spb.ru/</a>
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек от 250 р. без напитков
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Кухня европейская
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Способ обслуживания Просторное бистро напротив Московского вокзала. Раздача организована в формате free flow: гости перемещаются между «островками» с салатами, закусками, супами, выпечкой. 9 залов отделаны натуральным деревом и разделены перегородками и подиумами. В двух барах можно купить пиво из собственной пивоварни.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь пиво из собственной пивоварни.
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional">
                                                    <p class="single-on-top"><b>Дополнительные сервисы:</b></p>

                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Удобно напротив Московского вокзала
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Место нахождения:<br>
                                                        Лиговский пр, д.10/118 (1 этаж гостиницы «Октябрьская»)<br>
                                                        т. (812) 717-68-68<br>
                                                        Часы работы пн-вс 08:00-23:00
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Путь  от предыдущей точки маршрута
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-attention"></i>
                                                        Необходимость предварительного<br> бронирования
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab3">
                                            <a role="button" data-toggle="collapse" data-parent="#tab3" href="#tab3-collapse" aria-expanded="true" aria-controls="tab1-collapse">
                                                <div class="schedule__point">
                                                    <p><b>9:00</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    Экскурсия на двухэтажном автобусе<br class="hidden-md hidden-lg hidden-xs"> "Сити Тур" (11 языков)
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab3-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab3">
                                            <div class="panel-body schedule__excursion">
                                                <p>Посадка на пл. Островского 1/Невский пр. 37 (на углу Невского проспекта и площади Островского) </p>
                                                <p class="tour-legend-details">
                                                    <i class="icon icon-link"></i>
                                                    <a href="http://gocitybus.ru/cruise/city/ekskursiya-na-dvukhetazhnom-avtobuse-siti-tur-11-yazykov.html">http://gocitybus.ru/cruise/city/ekskursiya-na-dvukhetazhnom-avtobuse-siti-tur-11-yazykov.html</a>
                                                </p>
                                                <p><br></p>
                                                <div class="schedule__place__services">
                                                    <p class="tour-legend-details single-on-top">
                                                        <i class="icon icon-clock"></i>
                                                        Продолжительность одного круга 2 часа
                                                    </p>
                                                    <p class="tour-legend-details prices">
                                                        <i class="icon icon-ticket"></i>
                                                        Стоимость взрослый 590 руб. / чел.<br>
                                                        Ребенок (7-12 лет) : 300 руб. / чел.<br>
                                                        Ребенок (до 6 лет) : 0 руб. / чел.<br>
                                                    </p>
                                                    <p class="tour-legend-details prices">
                                                        Способ покупки Купить билеты на автобус можно на сайте,<br>
                                                        без комиссии и без очереди:<br>
                                                        - на сайте http://gocitybus.ru/personal/book-a-cruise.php#form, или<br>
                                                        - в кассе продаж по адресу: Невский пр. 22
                                                    </p>
                                                </div><div class="schedule__place__additional">
                                                    <p class="single-on-top"><b>Дополнительные сервисы:</b></p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-no-discount"></i>
                                                        Нет скидки для членов клуба
                                                    </p>
                                                </div>
                                                <p><br></p>
                                                <p><b>В ходе нашей экскурсии вы познакомитесь с главными достопримечательностями Петербурга: </b></p>
                                                <ul class="list-unstyled">
                                                    <li><p>Приглашаем вас на экскурсию по историческому центру Санкт-Петербурга на современном двухэтажном автобусе!<br>
                                                            В ходе нашей экскурсии вы познакомитесь с главными достопримечательностями Петербурга:<br>
                                                            архитектурными памятниками, относящимися к разным временным эпохам и стилям, красивыми невскими набережными, величественными дворцами, соборами и уникальными мостами. Вы увидите Исаакиевский, Казанский и Петропавловский cоборы, Эрмитаж, Русский музей, Дворцовую площадь, памятник Медному всаднику, Летний сад и многое другое. Экскурсия рассказывает не только о самих достопримечательностях, но также о мифах и легендах города на Неве.<br>
                                                            Маршрут включает 15 фиксированных остановок, на каждой из которых, по желанию, вы сможете выйти для осмотра достопримечательностей, а затем вновь продолжить ваше путешествие на автобусе.</p></li>
                                                    <li><p>
                                                            Вы увидите Исаакиевский, Казанский и Петропавловский cоборы, Эрмитаж, Русский музей, Дворцовую площадь, памятник Медному всаднику, Летний сад и многое другое.<br>
                                                            Ежедневно с 09:00 до 19:00 с интервалом в 40 мин.;<br>
                                                            Продолжительность одного круга 2 часа;<br>
                                                            Билет действует 1 день независимо от выбранного времени при бронировании!
                                                        </p></li>
                                                    <li><p>
                                                            Место отправления автобуса (начало круга): пл. Островского 1/Невский пр. 37 (на углу Невского проспекта и площади Островского).
                                                        </p></li>
                                                    <li><p>
                                                            Путь до места начала от предыдущей точки маршрута пешком
                                                        </p></li>
                                                </ul>
                                                <div class="stopover">
                                                    <div class="stopover__heading">
                                                        <i class="icon icon-stopover"></i>
                                                        <p><b>Промежуточные остановки</b></p>
                                                    </div>
                                                    <div class="stopover__current">
                                                        <div class="stop-block">
                                                            <p class="stop"><span>1 остановка:</span> Исаакиевский собор </p>
                                                            <p class="stop stop--eng"><span>1 Stop:</span> St. Isaac´s Cathedral</p>
                                                            <p>Посещение музея-памятника «Исаакиевский собор». </p>
                                                        </div>  <!--stop-block-->
                                                        <div class="schedule__place__services">
                                                            <p class="tour-legend-details">
                                                                <i class="icon icon-link"></i>
                                                                <a href="http://www.cathedral.ru/">http://www.cathedral.ru/</a>
                                                            </p>
                                                            <p class="tour-legend-details">
                                                                <i class="icon icon-clock"></i>
                                                                Режим работы: с 11:00 до 18:00 все дни недели, кроме среды
                                                            </p>
                                                            <p class="tour-legend-details prices">
                                                                <i class="icon icon-ticket"></i>
                                                                Стоимость взрослый от 250<br>
                                                                Билеты на сайте или в кассах собора
                                                            </p>
                                                        </div><div class="schedule__place__additional">
                                                            <p class="single-on-top"><b>Дополнительные сервисы:</b></p>

                                                            <p class="tour-legend-details">
                                                                <i class="icon icon-no-discount"></i>
                                                                Нет скидки для членов клуба
                                                            </p>
                                                        </div>
                                                        <ul class="list-unstyled">
                                                            <li><p>Путь  от предыдущей точки маршрута остановка экскурсионного автобуча Исаакиевский собор</p></li>
                                                        </ul>
                                                        <div class="stopover__desc">
                                                            <p><b>Описание</b></p>
                                                            <p>
                                                                Он стал четвертым петербургским храмом в честь Исаакия Далматского на этом месте — первый был возведен еще при Петре I. В течение 40 лет более 400 000 тысяч рабочих трудились над созданием этого грандиозного собора — проект известного французского архитектора Огюста Монферрана утвердил император Александр I, контролировал работы его преемник, Николай I, а в освящении храма принимал участие уже Александр II.<br>
                                                                На протяжении последних полутора веков «Исаакий» является самым большим православным храмом Санкт-Петербурга и одним из самых красивых в мировой христианской архитектуре. Очертания его колоссального купола давно превратились в один из главных символов Северной столицы.
                                                            </p>
                                                        </div>
                                                    </div>  <!--stopover__current-->

                                                    <div class="stopover__current">
                                                        <div class="stop-block">
                                                            <p class="stop"><span>Продолджение экскурсии:</span> от остановки Исаакиевский собор</p>
                                                            <p class="stop stop--eng"><span>Continuation of the tour:</span> St. Isaac´s Cathedral</p>
                                                        </div>  <!--stop-block-->
                                                        <div class="stop-block">
                                                            <p class="stop"><span>2 остановка:</span> Петропавловская крепость</p>
                                                            <p class="stop stop--eng"><span>2 Stop:</span> Peter and Paul Fortress</p>
                                                            <p>Место нахождения Заячий остров +7 (812) 230-64-31</p>
                                                        </div>  <!--stop-block-->
                                                        <p><br></p>
                                                        <p class="tour-legend-details">
                                                            <i class="icon icon-link"></i>
                                                            <a href="http://www.spbmuseum.ru/themuseum/museum_complex/peterpaul_fortress/">http://www.spbmuseum.ru/themuseum/museum_complex/peterpaul_fortress/</a>
                                                        </p>
                                                        <p><br></p>
                                                        <div class="schedule__place__services">
                                                            <p class="tour-legend-details work-hours">
                                                                <i class="icon icon-clock"></i>
                                                                Часы работы Территория Петропавловской крепости<br>
                                                                (в границах крепостных стен)<br>
                                                                Открыта для посещения:  ежедневно  с 9.00 до 21:00
                                                            </p>
                                                            <p class="tour-legend-details prices">
                                                                <i class="icon icon-ticket"></i>
                                                                Способ покупки:<br>
                                                                - сайт  http://excurspb.ru/previuos-order, или<br>
                                                                - наличные на причале
                                                            </p>
                                                        </div><div class="schedule__place__additional no-margin">
                                                            <p class="single-on-top"><b>Дополнительные сервисы:</b></p>

                                                            <p class="tour-legend-details">
                                                                <i class="icon icon-no-discount"></i>
                                                                Нет скидки для членов клуба
                                                            </p>
                                                        </div>
                                                    </div>  <!--stopover__current-->
                                                    <div class="tickets-price">
                                                        <p><b>Билеты на посещение экспозиций: </b></p>
                                                        <table>
                                                            <tr>
                                                                <td><p>Петропавловский собор и Великокняжеская усыпальница</p></td>
                                                                <td><p>330</p></td>
                                                                <td><p>210</p></td>
                                                                <td><p>140</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>"История Петербурга-Петрограда.1703 -1918"</p></td>
                                                                <td colspan="3"><p>бесплатно до 31 октября 2015г.</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>"История Петропавловской крепости"</p></td>
                                                                <td colspan="3"><p>бесплатно до 31 октября 2015г.</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>Музей космонавтики и ракетной техники им. В.П.Глушко</p></td>
                                                                <td><p>100</p></td>
                                                                <td><p>40</p></td>
                                                                <td><p>40</p></td>
                                                            </tr>
                                                        </table>
                                                    </div>  <!--tickets-price-->
                                                    <div class="tickets-price">
                                                        <p><b>Билеты на посещение временных выставок:</b></p>
                                                        <table>
                                                            <tr>
                                                                <td><p>"Грохочет бал , сияет бал"</p></td>
                                                                <td><p>150</p></td>
                                                                <td><p>80</p></td>
                                                                <td><p>80</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>"Наследие Эллады"</p></td>
                                                                <td><p>80</p></td>
                                                                <td><p>50</p></td>
                                                                <td><p>50</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>"Город и Цирк".<br class="hidden-sm hidden-md hidden-lg"> Выставка Владимира<br class="hidden-sm hidden-md hidden-lg"> Каминского</p></td>
                                                                <td><p>50</p></td>
                                                                <td><p>30</p></td>
                                                                <td><p>30</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>"Юрий Ларин. Монолог счастливого человека"</p></td>
                                                                <td><p>100</p></td>
                                                                <td><p>50</p></td>
                                                                <td><p>50</p></td>
                                                            </tr>
                                                        </table>
                                                    </div>  <!--tickets-price-->
                                                    <div class="tickets-price">
                                                        <p><b>Билет на экспозицию "Улица Времени":</b></p>
                                                        <table>
                                                            <tr>
                                                                <td><p>с 1 января по 31 мая  и с 1 сентября по 31 декабря</p></td>
                                                                <td><p>90</p></td>
                                                                <td><p>130</p></td>
                                                                <td><p>30</p></td>
                                                            </tr>
                                                            <tr>
                                                                <td><p>с 1 июня по 31 августа</p></td>
                                                                <td><p>80</p></td>
                                                                <td><p>100</p></td>
                                                                <td><p>30</p></td>
                                                            </tr>
                                                        </table>
                                                    </div>  <!--tickets-price-->
                                                    <p><br></p>
                                                    <p><b>Путь до места начала от предыдущей точки маршрута пешком</b></p>
                                                    <p><br></p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-attention"></i>
                                                        Необходимость предварительного бронирования возможно
                                                    </p>
                                                    <p><br></p>
                                                    <div class="stopover__desc">
                                                        <p><b>Описание</b></p>
                                                        <p>
                                                            Крепость входит в состав Музея истории Санкт-Петербурга. С Нарышкина бастиона Петропавловской крепости ежедневно в 12:00 производится выстрел сигнальной пушки.<br>
                                                            В 1991 году на территории Петропавловской крепости установлен памятник Петру Великому работы скульптора Шемякина.<br>
                                                            С начала XXI века на пляже Петропавловской крепости проводятся различные развлекательные мероприятия. Также проводятся экскурсии.<br>
                                                            С Нарышкина бастиона Петропавловской крепости ежедневно в 12:00 производится выстрел сигнальной пушки.<br>
                                                            В 1991 году на территории Петропавловской крепости установлен памятник Петру Великому работы скульптора Шемякина.
                                                        </p>
                                                    </div>
                                                    <p><br></p>
                                                    <p class="hidden-xs hidden-sm"><br></p>
                                                    <div class="stop-block">
                                                        <p class="stop"><span>Продолджение экскурсии:</span> Петропавловская крепость</p>
                                                        <p class="stop stop--eng"><span>Continuation of the tour:</span> Peter and Paul Fortress </p>
                                                    </div>  <!--stop-block-->
                                                </div>  <!--stopover-->
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab4">
                                            <a role="button" data-toggle="collapse" data-parent="#tab4" href="#tab4-collapse" aria-expanded="true" aria-controls="tab1-collapse">
                                                <div class="schedule__point">
                                                    <p><b>Обед</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    1 вариант: Market Place
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab4-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab4">
                                            <div class="panel-body schedule__place schedule__place--mod">
                                                <p class="tour-legend-details">
                                                    <i class="icon icon-link"></i>
                                                    <a href="http://market-place.me/">http://market-place.me/</a>
                                                </p>
                                                <p><br></p>
                                                <div class="schedule__place__services">
                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек до 700 руб.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Европейская, итальянская, китайская, фастфуд
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Самообслуживание.<br>
                                                        Сеть кафе в центре города.По сути столовая,<br>
                                                        но аккуратная и комфортабельная. Самообслуживание, но<br>
                                                        персонал за раздачей дружелюбен и подкован. На<br>
                                                        отдельной станции жарят стейки гриль и крутят панини.<br>
                                                        В меню царствует дружба народов — от буррито до тортильи, от винегрета до нисуаза, от стейков до<br>
                                                        сэндвичей. На втором этаже кофе с плюшками и свежими соками.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь имеется
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Адреса: Невский пр., 92 м. Маяковская, +7<br>
                                                        (981) 128 23 69 пн-ср 08:30-23:00 чт-вс 08:30-06:00;
                                                        Невский пр., 24, м. Невский проспект, 8 (981)
                                                        854-48-33 часы работы:<br>
                                                        08:30 - 06:00
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Путь  от предыдущей точки маршрута
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading another-variant" role="tab" id="tab5">
                                            <a role="button" data-toggle="collapse" data-parent="#tab5" href="#tab5-collapse" aria-expanded="true" aria-controls="tab1-collapse">
                                                <div class="schedule__point invisible">
                                                    <p><b>Ужин</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    2 вариант: МАРЧЕЛЛИС
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab5-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab5">
                                            <div class="panel-body schedule__place">
                                                <div class="schedule__place__services">
                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-link"></i>
                                                        <a href="http://www.marcellis.ru/">http://www.marcellis.ru/</a>
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек 900 р. без напитков
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Европейская, итальянская
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Ресторан.<br>
                                                        Немного претенциозная сеть ресторанов в центре<br>
                                                        города. Предлагаем посетить один из ресторанов на<br>
                                                        Невском проспекте и пообедать дейсвительно в<br>
                                                        качественном месте с видом на самую оживленную<br>
                                                        улицу северной столицы.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь имеется
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Адреса: Невский пр., д.43, время работы 24 часа.
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        - Путь от предыдущей точки маршрута: пешком
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading another-variant" role="tab" id="tab6">
                                            <a role="button" data-toggle="collapse" data-parent="#tab6" href="#tab6-collapse" aria-expanded="true" aria-controls="tab6-collapse">
                                                <div class="schedule__point invisible">
                                                    <p><b>Ужин</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    3 вариант: Bekizer
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab6-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab6">
                                            <div class="panel-body schedule__place">
                                                <div class="schedule__place__services">

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек 500 р. без напитков
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Европейская, итальянская
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Ресторан.<br>
                                                        Немного претенциозная сеть ресторанов в центре<br>
                                                        города. Предлагаем посетить один из ресторанов на<br>
                                                        Невском проспекте и пообедать дейсвительно в<br>
                                                        качественном месте с видом на самую оживленную<br>
                                                        улицу северной столицы.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь имеется
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  Адреса: Невский пр., д.43, время работы 24 часа.
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        - Путь от предыдущей точки маршрута: пешком
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab7">
                                            <a role="button" data-toggle="collapse" data-parent="#tab7" href="#tab7-collapse" aria-expanded="true" aria-controls="tab7-collapse">
                                                <div class="schedule__point">
                                                    <p><b>Вечер</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    Прогулка по рекам и каналам Северная<br class="hidden-md hidden-lg"> Венеция
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab7-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab7">
                                            <div class="panel-body schedule__place schedule__place--mod">
                                                <div class="schedule__place__services">

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-link"></i>
                                                        <a href="http://excurspb.ru/water/watobz.html">http://excurspb.ru/water/watobz.html</a>
                                                    </p>

                                                    <p class="tour-legend-details work-hours">
                                                        <i class="icon icon-clock"></i>
                                                        Продолжительность прогулки: 1 час 15 минут<br>
                                                        Время начала ежедневно каждые 30–45 минут с 11:00<br> до 22:30
                                                    </p>
                                                    <p class="tour-legend-details prices">
                                                        <i class="icon icon-ticket"></i>
                                                        Стоимость:<br>
                                                        Взрослый - 700 / Детский - 600 / Льготный - 400<br>
                                                        Способ покупки:<br>
                                                        - сайт  http://excurspb.ru/previuos-order , или<br>
                                                        - наличные на причале
                                                    </p>

                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-no-discount"></i>
                                                        Нет скидки для членов клуба
                                                    </p>
                                                    <p><br></p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        - Место начала от Аничкова моста<br>
                                                        (наб. Фонтанки, 27).<br>
                                                        Путь до места начала от предыдущей точки маршрута пешком
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-attention"></i>
                                                        Необходимость предварительного бронирования возможно
                                                    </p>
                                                </div>
                                                <p><br></p>
                                                <p>Предлагаем вам отправиться на дневную водную прогулку по рекам и каналам Санкт-Петербурга. Наш комфортабельный теплоход
                                                    отправится от пристани на реке Фонтанка, пройдет по Крюкову каналу, реке Мойка. У вас будет уникальная возможность осмотреть
                                                    достопримечательности нашего города с воды. В заключении прогулки наш теплоход выйдет в акваторию Невы, где перед вами
                                                    откроется потрясающий вид на Зимний дворец, Петропавловскую крепость и мосты над Невой — Дворцовый и Благовещенский.</p>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading" role="tab" id="tab8">
                                            <a role="button" data-toggle="collapse" data-parent="#tab8" href="#tab8-collapse" aria-expanded="true" aria-controls="tab8-collapse">
                                                <div class="schedule__point">
                                                    <p><b>Ужин</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    1 вариант: Кококо
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab8-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab8">
                                            <div class="panel-body schedule__place">
                                                <div class="schedule__place__services">

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-link"></i>
                                                        <a href="http://www.kokoko.spb.ru/">http://www.kokoko.spb.ru/</a>
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек 1500-2000 руб
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Русская
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Ресторан.<br>
                                                        Создатель - самый настоящий питерец - Сергей<br>
                                                        Шнуров. Продукты почти все используют локальные —<br>
                                                        толокно, копченая скумбрия, малосольные огурцы,<br>
                                                        облепиха и варенье из лука.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь имеется
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  ул. Некрасова, 8, м. пл. Восстания, пр. Чернышевскгого
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        - Путь от предыдущей точки маршрута: пешком
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                    <div class="panel panel-default active">
                                        <div class="panel-heading another-variant" role="tab" id="tab9">
                                            <a role="button" data-toggle="collapse" data-parent="#tab9" href="#tab9-collapse" aria-expanded="true" aria-controls="tab9-collapse">
                                                <div class="schedule__point invisible">
                                                    <p><b>Ужин</b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    2 вариант: Чердак художника
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="tab9-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab9">
                                            <div class="panel-body schedule__place">
                                                <div class="schedule__place__services">

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-link"></i>
                                                        <a href="http://www.glassdesign.ru/">http://www.glassdesign.ru/</a>
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-bill"></i>
                                                        Средний чек 700-1500 руб
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-chief"></i>
                                                        Европейская, итальянская
                                                    </p>

                                                    <p class="tour-legend-details method-of-service">
                                                        <i class="icon icon-cofee"></i>
                                                        Ресторан.<br>
                                                        Если пройти по лестнице галереи «Стекло» наверх,<br>
                                                        мимо стеклянных жар-птиц, вышитых шелком картин,<br>
                                                        фарфоровых кукол и многозначительных произведений<br>
                                                        петербургских современных художников, то в конце<br>
                                                        концов можно выйти под самую крышу, действительно<br>
                                                        — бывший чердак, где хозяева галереи устроили кафе.<br>
                                                        Сами они предпочитают называть его фондю-баром и<br>
                                                        фондю обозначают в меню первой же позицией. В<br>
                                                        горячий расплавленный сыр или в масло<br>
                                                        специальными вилочками макают хлеб, ветчину,<br>
                                                        картошку, мясо, креветки. Еще здесь есть шоколадное<br>
                                                        фондю с фруктами. А кроме того, супы, салаты, пасты<br>
                                                        — и все это в уютной мансарде с цветами, белоснежными<br>
                                                        салфетками и фирменным петербургским видом на
                                                        небо и крыши.
                                                    </p>

                                                    <p class="tour-legend-details">
                                                        <i class="icon icon-drink"></i>
                                                        Алкоголь имеется
                                                    </p>

                                                    <p class="tour-legend-details none-smokers">
                                                        <i class="icon icon-not-smoke"></i>
                                                        Для не курящих
                                                    </p>
                                                </div><div class="schedule__place__additional schedule__place__additional--standart">
                                                    <p class=""><b>Дополнительные сервисы:</b></p>
                                                    <p class="tour-legend-details members-discount">
                                                        <i class="icon icon-discount"></i>
                                                        Скидка  для членов клуба
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        <i class="icon icon-star"></i>
                                                        Рекомендуемые причины посещения:
                                                    </p>
                                                    <p class="tour-legend-details recommended-reasons">
                                                        -  ул. Некрасова, 8, м. пл. Восстания, пр. Чернышевскгого
                                                    </p>

                                                    <p class="tour-legend-details recommended-reasons">
                                                        - Путь от предыдущей точки маршрута: пешком
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  <!--panel-->

                                </div>  <!--panel-group-->
                            </div>  <!--schedule-->
                        </div>  <!--tab-pane-->

                        <div class="tab-pane" id="day2">
                            День 2
                        </div>  <!--tab-pane-->

                    </div>  <!--tab-content-->

                    <div class="confirmed">
                        <div class="confirmed__heading">
                            <h4 class="title">ПОДТВЕРЖДЕННЫЕ БРОНИРОВАНИЯ</h4>
                        </div>

                        <p class="location">Санкт-Петербург</p>
                        <div class="reservation">
                            <div class="panel-group" id="confirmed-reservation" role="tablist" aria-multiselectable="true">
                                <?php foreach($model->hotels as $hotel): ?>
                                <div class="panel panel-default active">
                                    <div class="panel-heading" role="tab" id="reserv-tab1">
                                        <i class="icon icon-hotel"></i>
                                        <p><?=Html::encode($hotel->title_ru)?></p>
                                        <a class="common-button" role="button" data-toggle="collapse" data-parent="#reserv-tab<?=$hotel->id?>" href="#reserv-tab<?=$hotel->id?>-collapse" aria-expanded="true" aria-controls="reserv-tab<?=$hotel->id?>-collapse">
                                            Подробнее
                                        </a>
                                    </div>  <!--panel-heading-->
                                    <div id="reserv-tab<?=$hotel->id?>-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="reserv-tab<?=$hotel->id?>">
                                        <div class="panel-body">
                                            <?=Html::decode($hotel->description_ru)?>
                                            <div class="reservation-address">
                                                <p><b>Место нахождения:</b></p>
                                                <?=Html::decode($hotel->place_ru)?>
                                            </div>
                                            <div class="reservation-address how-get">
                                                <p><b>Как добраться:</b></p>
                                                <?=Html::decode($hotel->way_ru)?>
                                            </div>
                                            <p class="tour-legend-details"><i class="icon icon-discount"></i>Скидка для членов клуба <?=Html::encode($hotel->discount)?>%</br>
                                                <i>(Способ получения скидки промокод при бронировании на сайте гостиницы)</i></p>
                                            <p class="tour-legend-details"><i class="icon icon-link"></i>Ссылка на сайт:</br>
                                                <?=Html::decode($hotel->link)?></p>
                                        </div>
                                    </div>  <!--panel-collapse-->
                                </div>  <!--panel-->
                                <?php endforeach; ?>
                            </div>  <!--panel-group-->


                        </div>  <!--reservation-->
                    </div>  <!--confirmed-->
                </div>

            </div>
        </div>
    </div>  <!--event-page-->
</div>  <!--grid-->

