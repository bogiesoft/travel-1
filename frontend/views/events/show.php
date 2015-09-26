<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = $model->title_ru;
$this->params['sidebarType'] = 3;

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/events/']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/events/'.$model->id]]; ?>

<div class="event-page">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=Html::encode($model->title_ru)?>
                </h3>
            </div>  <!--main-content__heading-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <section class="event-slider">
                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                        <?php $images = $model->getImages();
                        foreach($images as $image): ?>
                        <li data-thumb="<?=$image->getUrl('69x52')?>">
                            <img src="<?=$image->getUrl('309x231')?>" />
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </section>  <!--event-slider-->

                <div class="event-photos">
                    <div id="photo-gallery" class="gallery cS-hidden">
                        <?php foreach($images as $image): ?>
                            <img src="<?=$image->getUrl('309x231')?>" />
                        <?php endforeach; ?>
                    </div>
                    <a href="#" class="common-button load-more-btn">Показать фото</a>
                </div>
                <div class="event-details">
                    <ul class="list-unstyled">
                        <li><p><span>Страна: </span><i class="events__country__icon"><img src="<?=$country->getImage()->getUrl('30x19')?>" alt=""></i><?=Html::encode($country->title_ru)?></p></li>
                        <li><p><span>Место: </span><?=Html::encode($model->place_ru)?></p></li>
                        <li><p class="date"><span>Состоится: </span><b><?php $date = new DateTime($model->date); echo $date->format('d/m/Y'); ?></b></p></li>
                        <li>
                            <p><span>Рейтинг: </span>
                            </p>
                            <div class="rating">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>
                        </li>
                    </ul>
                    <div class="event-details__action">
                        <i class="event-details__action__icon"></i><a href="#" class="common-button common-button--thin">Туры в Бразилию</a>
                    </div>
                    <div class="event-details__action">
                        <i id="order-ticket" class="event-details__action__icon"></i><a href="<?=$model->tickets_link?>" class="common-button common-button--thin">Заказ билетов на мероприятие</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="consultations__block">
                    <?=Html::decode($model->content_ru)?>
                </div>  <!--consultations__block-->
            </div>
        </div>
    </div>
</div>  <!--event-page-->
