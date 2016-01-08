<?php

$this->title = 'Забронированные туры';
$this->params['sidebarType'] = -1;
$this->params['layoutClass'] = "personal-cabinet col-lg-10 col-md-12";
?>
 <div class="container">
        <div class="main-content__heading">
            <h3 class="title">
                Обсуждения
            </h3>
        </div>  <!--main-content__heading-->
        <div class="row">
            <div class="schedule schedule--reserved">
                <div class="panel-group" id="tour-legend" role="tablist" aria-multiselectable="true">
                    <?php foreach($tours as $k => $tour): ?>
                    <div class="panel panel-default <?=!$k ? 'active':'';?>">
                        <div class="panel-heading" role="tab" id="tab<?=$k?>">
                            <a role="button" data-toggle="collapse" data-parent="#tab<?=$k?>" href="#tab<?=$k?>-collapse" aria-expanded="true" aria-controls="tab<?=$k?>-collapse">
                                <ul class="reserved-tours list-unstyled">
                                    <li>
                                        <i class="icon icon-sheep"></i>
                                        <p><?=$tour->title_ru?>
                                        </p>
                                    </li>
                                </ul>
                            </a>
                        </div>
                        <div id="tab<?=$k?>-collapse" class="panel-collapse collapse <?=!$k ? 'in':'';?>" role="tabpanel" aria-labelledby="tab<?=$k?>">
                            <div class="panel-body">
                                <div class="schedule__heading">
                                    <h5 class="title">
                                        Расписание тура
                                    </h5>
                                    <p><b>Длительность: </b><span><?=$tour->duration?>.</span></p>
                                </div>
                                <table class="tour-schedule-table">
                                    <thead>
                                    <tr>
                                        <th><p>Город</p></th>
                                        <th><p>Дата</p></th>
                                        <th><p>Время</p></th>
                                        <th><p>Бронирование</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($tour->brones as $brone):
                                        $date = new DateTime($brone->tourvariant->datetime);
                                        $formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
                                        $formatter->setPattern('d MMMM'); ?>
                                    <tr>
                                        <td><p><?= $brone->city->title_ru ?></p></td>
                                        <!--<td><p><b>День <?/*//=$brone->tourvariant->daynum*/?>й</b></p></td>-->
                                        <td><p><?=$formatter->format($date);?></p></td>
                                        <td><p><?php $formatter->setPattern('HH:mm'); echo $formatter->format($date); ?></p></td>
                                        <td><p><a href="<?= $brone->object->link ?>"><?= $brone->object->title_ru?></a></p></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="tour-schedule-mobile">
                                    <div class="tour-schedule-mobile__part">
                                        <div class="tour-schedule-modile__day">
                                            <p><span class="day-number"><b>1й</b></span></p><p><b>День</b></p><p class="city">Санкт-Петербург</p>
                                        </div>
                                        <div class="tour-schedule-modile__details">
                                            <p><span>Дата/Время:</span>31 декабря &nbsp;&nbsp;&nbsp;17.00 - 22.00</p>
                                            <p><span>Бронирование:</span><a href="#">Гостиница 1</a></p>
                                        </div>
                                    </div>  <!--tour-schedule-mobile__part-->
                                    <div class="tour-schedule-mobile__part">
                                        <div class="tour-schedule-modile__day">
                                            <p><span class="day-number"><b>2й</b></span></p><p><b>День</b></p><p class="city">Хельсинки</p>
                                        </div>
                                        <div class="tour-schedule-modile__details">
                                            <p><span>Дата/Время:</span>29 декабря &nbsp;&nbsp;&nbsp;17.00 - 22.00</p>
                                            <p><span>Бронирование:</span><a href="#">Гостиница 2</a></p>
                                        </div>
                                    </div>  <!--tour-schedule-mobile__part-->
                                    <div class="tour-schedule-mobile__part">
                                        <div class="tour-schedule-modile__day">
                                            <p><span class="day-number"><b>3й</b></span></p><p><b>День</b></p><p class="city">Стокгольм</p>
                                        </div>
                                        <div class="tour-schedule-modile__details">
                                            <p><span>Дата/Время:</span>30 декабря &nbsp;&nbsp;&nbsp;17.00 - 22.00</p>
                                            <p><span>Бронирование:</span><a href="#">Гостиница 3</a></p>
                                        </div>
                                    </div>  <!--tour-schedule-mobile__part-->
                                    <div class="tour-schedule-mobile__part">
                                        <div class="tour-schedule-modile__day">
                                            <p><span class="day-number"><b>4й</b></span></p><p><b>День</b></p><p class="city">Таллин</p>
                                        </div>
                                        <div class="tour-schedule-modile__details">
                                            <p><span>Дата/Время:</span>1 января &nbsp;&nbsp;&nbsp;17.00 - 22.00</p>
                                            <p><span>Бронирование:</span><a href="#">Гостиница 4</a></p>
                                        </div>
                                    </div>  <!--tour-schedule-mobile__part-->
                                    <div class="tour-schedule-mobile__part">
                                        <div class="tour-schedule-modile__day">
                                            <p><span class="day-number"><b>5й</b></span></p><p><b>День</b></p><p class="city">Санкт-Петербург</p>
                                        </div>
                                        <div class="tour-schedule-modile__details">
                                            <p><span>Дата/Время:</span>2 января &nbsp;&nbsp;&nbsp;17.00 - 22.00</p>
                                            <p><span>Бронирование:</span><a href="#">Гостиница 5</a></p>
                                        </div>
                                    </div>  <!--tour-schedule-mobile__part-->
                                </div>  <!--tour-schedule-mobile-->

                                <div class="schedule__heading">
                                    <h5 class="title">
                                        Описание тура
                                    </h5>
                                </div>
                                <div class="note">
                                    <div class="note__features">
                                        <i class="icon icon-like"></i><p><b>В стоимость включено</b></p>
                                    </div>
                                    <?=\yii\helpers\Html::decode($tour->incost)?>
                                    <div class="note__features">
                                        <i class="icon icon-dollar icon-dollar--active"></i><p><b><span>Обязательно оплачивается</span></b></p>
                                    </div>
                                    <?=\yii\helpers\Html::decode($tour->outcost)?>
                                    <div class="note__features">
                                        <i class="icon icon-dollar"></i><p><b>Оплачивается по желанию</b></p>
                                    </div>
                                    <?=\yii\helpers\Html::decode($tour->maybecost)?>
                                </div>  <!--note-->
                            </div>
                        </div>
                    </div>  <!--panel-->
                    <?php endforeach; ?>

                </div>  <!--panel-group-->
            </div>  <!--schedule-->
        </div>
</div>

<br><br><br>