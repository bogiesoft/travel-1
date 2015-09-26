<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Мероприятия - '.$country->title_ru;
$this->params['sidebarType'] = 2;

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/events/']];
$this->params['breadcrumbs'][] = ['label' => $country->title_ru, 'url' => ['/events/country/'.$country->id]];?>

<div class="events">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=$this->title?>
                </h3>
            </div>  <!--main-content__heading-->

            <?php $icon = $country->getImage(); ?>

                    <div class="events__country clearfix">
                        <div class="events__country__heading">
                            <i class="events__country__icon"><img src="<?=$icon->getUrl('30x19')?>" alt=""></i><h4 class="title"><?=Html::encode($country->title_ru)?></h4>
                        </div>
                        <?php foreach($models as $event) {
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
                                        <div class="rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                    </div>
                                    <a href="<?=Url::to('/events/show/'.$event->id)?>"><?=Html::encode($event->title_ru)?></a>
                                    <p>(<?=Html::encode($event->place_ru)?>)</p>
                                </div>
                            </div>  <!--events__country__event-->
                        <?php } ?>
                    </div>
        </div>
    </div>
</div>  <!--web-cams-page-->