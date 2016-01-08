<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Мероприятия';
$this->params['sidebarType'] = 2;

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/events/']]; ?>

<div class="events">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=$this->title?>
                </h3>
            </div>  <!--main-content__heading-->

            <?php foreach($models as $model) {
                $events = $model->getEvents($where)->all();
                if($events) {
                    $icon = $model->getImage();
                    ?>

                <div class="events__country clearfix">
                    <div class="events__country__heading">
                        <i class="events__country__icon"><img src="<?=$icon->getUrl('30x19')?>" alt=""></i><h4 class="title"><?=Html::encode($model->title_ru)?></h4>
                    </div>
                <?php foreach($events as $event) {
                    $image = $event->getImage();
                    $date = new DateTime($event->date);
                    ?>
                        <div class="events__country__event col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="image">
                                <img src="<?=$image->getUrl('300x185');?>" alt="">
                            </div>
                            <div class="caption">
                                <div class="justify-elements-align">
                                    <h4 class="date"><?=$date->format('d/m/Y')?></h4>
                                    <?php
                                    if($event->rating) {
                                        $rating_all = array_sum(\yii\helpers\ArrayHelper::map($event->rating, 'id', 'rating'));
                                        $rating = (int)$rating_all / count($event->rating);
                                    } else {
                                        $rating = 0;
                                    }
                                    ?>
                                    <div class="rating rating-<?=$rating?>" data-event-id="<?=$event->id?>">
                                        <?php for($i=1; $i<=5; $i++){ ?>
                                        <span <?=$i == 6-$rating ? 'class="active"':'' ?>>☆</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <a href="<?=Url::to('/events/show/'.$event->id)?>"><?=Html::encode($event->title_ru)?></a>
                                <p>(<?=Html::encode($event->place_ru)?>)</p>
                            </div>
                        </div>  <!--events__country__event-->
                    <?php } ?>
                    <div class="visible-sm visible-xs text-center events__country__additional"><a href="<?=Url::to('/events/country/'.$model->id)?>" class="common-button load-more-btn common-button--thin">Еще мероприятия</a></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-right  hidden-sm hidden-xs">
                            <a href="<?=Url::to('/events/country/'.$model->id)?>" class="events__country__more-events">Больше мероприятий<i></i></a>
                        </div>
                    </div>  <!--events__country-->
            <?php }
            } ?>

            <div class="text-center <?=!$showMoreButton ? 'hidden' : ''?> hidden-sm hidden-xs">
                <a href="<?=$limit?>" class="common-button load-more-btn common-button--thin">Показать ещё страны</a>
            </div>
        </div>
    </div>
</div>  <!--web-cams-page-->