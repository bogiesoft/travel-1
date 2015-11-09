<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\controllers\SiteController;

$this->title = $model->title_ru;
$this->params['sidebarType'] = 3;
$this->params['breadcrumbs'][] = ['label' => 'Каталог туров', 'url' => ['/tours/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .schedule .panel-heading a {
        height: auto;
    }
    .tour-legend-details p {
        display: inline;
    }
</style>

<style>
    .tour-legend-details {
        padding: 10px 0 10px 4px;
    }
</style>

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
                    <?php foreach($model->getCitiesCustom($model->id) as $key => $city): ?>
                    <div class="location__point<?=($key+1)%2 ? ' active':''?>">
                        <?=($key+1)%2 ? '<i></i>':''?>
                        <p><?=Html::encode($city['title_ru'])?></p>
                        <?=($key+1)%2 ? '':'<i></i>'?>
                    </div>
                    <?php endforeach; ?>

                </div>
                <section class="event-slider">
                    <ul id="image-gallery" class="without-thumbs gallery list-unstyled cS-hidden">
                        <?php foreach($model->getImages() as $image): ?>
                        <li>
                            <img src="<?=$image->getUrl('400x260')?>" />
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </section>  <!--event-slider-->
                <div class="tour-details">
                    <ul class="list-unstyled">
                        <li><p><span>Автор:</span> <?=Html::encode($model->userdata->firstname)?> <?=Html::encode($model->userdata->lastname)?></p></li>
                        <li><p><span>При поддержке:</span> <?=Html::encode($model->support)?>  </p></li>
                        <li><p><span>Категории:</span> <?=implode(', ', \yii\helpers\ArrayHelper::map($model->categories, 'id', 'title_ru'))?></p></li>
                        <li><p><span>Длительность:</span> <?=count($model->days)?> дня </p></li>

                    </ul>
                </div>  <!--tour-details-->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="select-day nav nav-tabs">
                    <?php foreach($model->days as $k => $day){ $k++; ?>
                    <li <?=$k == 1 ? 'class="active"' : ''; ?>><a href="#day<?=$k?>" data-toggle="tab">День <?=$k?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach($model->days as $k => $day): $k++; ?>
                    <div class="tab-pane <?=$k==1 ? 'active':'';?>" id="day<?=$k?>"><p>
                        <div class="schedule">
                            <div class="panel-group" id="tour-legend" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default active">
                                <?php foreach($day->schedule as $e => $element):
                                    foreach($element->variants as $v => $variant): ?>
                                        <div class="panel-heading <?=$v?'another-variant':''?>" role="tab" id="tab<?='d'.$k.'e'.$e.'v'.$v?>">
                                            <a role="button" data-toggle="collapse" data-parent="#tab<?='d'.$k.'e'.$e.'v'.$v?>" href="#tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse" aria-expanded="true" aria-controls="tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse">
                                                <div class="schedule__point <?=$v?'invisible':''?>">
                                                    <p><b><?=$variant->label?></b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    <?=$variant->header?>
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>

                                        <div id="tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tab<?='d'.$k.'e'.$e.'v'.$v?>">
                                            <div class="panel-body schedule__place">
                                                <?php foreach($variant->fields as $field){ ?>
                                                    <div class="tour-legend-details">
                                                        <?=$field->type['icon']?'<i class="'.$field->type['icon'].'"></i>':''?>
                                                        <p><?=$field->content?></p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                                </div>
                                </div>

                            </div>

                        </div>  <!--schedule-->
                    <?php endforeach; ?>
                </div>  <!--tab-content-->

                <div class="confirmed">
                    <div class="confirmed__heading">
                        <h4 class="title">ПОДТВЕРЖДЕННЫЕ БРОНИРОВАНИЯ</h4>
                    </div>

                    <div class="reservation">
                        <div class="panel-group" id="confirmed-reservation" role="tablist" aria-multiselectable="true">
                            <?php foreach($model->hotels as $key => $hotel): ?>
                                <div class="panel panel-default<?=!$key?' active':''?>">
                                    <div class="panel-heading" role="tab" id="reserv-tab1">
                                        <i class="icon icon-hotel"></i>
                                        <p><?=Html::encode($hotel->title_ru)?></p>
                                        <a class="common-button" role="button" data-toggle="collapse" data-parent="#reserv-tab<?=$hotel->id?>" href="#reserv-tab<?=$hotel->id?>-collapse" aria-expanded="true" aria-controls="reserv-tab<?=$hotel->id?>-collapse">
                                            Подробнее
                                        </a>
                                    </div>  <!--panel-heading-->
                                    <div id="reserv-tab<?=$hotel->id?>-collapse" class="panel-collapse collapse<?=!$key?' in':''?>" role="tabpanel" aria-labelledby="reserv-tab<?=$hotel->id?>">
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
                                                <?=Html::a($hotel->link,$hotel->link)?></p>
                                        </div>
                                    </div>  <!--panel-collapse-->
                                </div>  <!--panel-->
                            <?php endforeach; ?>
                        </div>  <!--panel-group-->


                    </div>  <!--reservation-->
                </div>  <!--confirmed-->

                <div class="note">
                    <div class="note__heading">
                        <h4 class="title">Примечания</h4>
                    </div>  <!--note__heading-->
                    <div class="note__features">
                        <i class="icon icon-like"></i><p><b>В стоимость включено</b></p>
                    </div>
                    <?=Html::decode($model->incost)?>
                    <div class="note__features">
                        <i class="icon icon-dollar icon-dollar--active"></i><p><b><span>Обязательно оплачивается</span></b></p>
                    </div>
                    <?=Html::decode($model->outcost)?>
                    <div class="note__features">
                        <i class="icon icon-dollar"></i><p><b>Оплачивается по желанию</b></p>
                    </div>
                    <?=Html::decode($model->maybecost)?>
                </div>  <!--note-->
            </div>

        </div>
    </div>
</div>  <!--tour-legend-->
