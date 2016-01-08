<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\controllers\SiteController;

$this->title = 'Главная - Турфирм.НЕТ';
$this->params['sidebarType'] = 1;
?>

<style>
    .featured-tours__current__desc h3.title {
        max-height: initial;
    }
</style>
                <div class="slider-block">
                    <div class="owl-carousel main-slider">
                        <?php foreach($slides as $slide):
                            $image = $slide->getImage(); ?>
                        <a href="<?=Url::to($slide->link)?>" class="main-slider__item">
                            <img src="<?=$image->getUrl('1012x497')?>" alt="">
                            <div class="main-slider__desc">
                                <h2 class="main-slider__desc__title"><?=Html::decode($slide->title_ru)?></h2>
                                <?=Html::decode($slide->excerpt_ru)?><?php
                                //<a href="<?=Url::to($slide->link)" class="common-button"><?=Html::encode($slide->link_name_ru)</a>
                                ?>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>  <!--slider-block-->

                <div class="day-advice clearfix">
                    <div class="day-advice__corner"></div>
                    <div class="day-advice__corner-border"></div>
                    <div class="owl-carousel day-advice-slider">
                        <?php foreach($advices as $advice): ?>
                        <div class="day-advice-slider__item">
                            <h2 class="title"><?=Html::encode($advice->main_title_ru)?></h2>
                            <h3 class="title"><?=Html::encode($advice->sub_title_ru)?></h3>
                            <hr>
                            <p>	<?=Html::encode($advice->excerpt_ru)?>
                            </p>
                            <a href="<?=Url::to(['advice/show/'.$advice->id])?>" class="common-button"><?=Html::encode($advice->button_title_ru)?></a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>  <!--day-advice-->

                <div class="tours-catalog">
                    <div class="tours-catalog__heading">
                        <a href="<?=Url::to('/tours/')?>" type="button" class="btn common-button">Каталог идей путешествий</a>
                    </div>
                </div>  <!--tours-catalog-->

                <div class="more-about-us clearfix">
                    <h3 class="title"><?=Html::decode(SiteController::getOption('about_header'))?></h3>
                    <?=Html::decode(SiteController::getOption('about_text'))?>
                    <a href="<?=Url::to(['/page/show/1'])?>"><button type="button" class="btn common-button">БОЛЬШЕ О НАС</button></a>
                </div>  <!--more-about-us-->

                <div class="search-tour">
                    <form method="get" action="<?=Url::to('/tours/index/')?>">
                        <div class="search-field">
                            <input type="search" placeholder="Поиск по турам" name="search" class="common-form-element">
                            <input type="submit" value="">
                        </div>
                        <input type="text" name="city" placeholder="Город" class="common-form-element pull-left">
                        <input type="text" name="people" placeholder="Количество человек" class="common-form-element">
                        <input type="text" name="duration" placeholder="Продолжительность" class="common-form-element pull-right">
                    </form>
                </div>  <!--search-tour-->

                <div class="featured-tours clearfix">
                    <div class="featured-tours__corner"></div>
                    <div class="owl-carousel featured-tours-slider">
                        <div class="featured-tours-slider__item">
                            <h2 class="title">Рекомендуемые туры</h2>
                            <p>Таким образом рамки и место обучения кадров влечет за собой процесс внедрения и модернизации модели развития</p>
                        </div>
                    </div>  <!--featured-tours-slider-->
                    <div class="featured-tours__catalog clearfix">
                        <?php foreach($tours as $tour): ?>
                        <div class="featured-tours__current col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <?=$tour->getImage() ? '<img src="'.$tour->getImage()->getUrl('450x315').'" alt="">': '';?>
                            <div class="featured-tours__current__desc">
                                <h3 class="title"><?=$tour->title_ru?></h3>
                                <p>	<?=StringHelper::truncateWords($tour->description_ru, 20)?>
                                <p><br></p>
                                    <br>
                                </p>
                                <p class="duration">Длительность: <?=count($tour->days)?> дней</p>
                                <a href="<?=Url::to('/tours/show/'.$tour->id)?>" class="btn btn-sm">Узнать больше</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?=Url::to('/tours/')?>" class="common-button">Все туры</a>
                </div>  <!--featured-tours-->

                <div class="banners clearfix">
                    <?php foreach($adv as $banner):
                        $image = $banner->getImage();?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><a href="<?=Url::to($banner->link)?>"><img src="<?=$image->getUrl('299x269')?>"></a></div>
                    <?php endforeach; ?>
                </div>  <!--banners-->

                <div class="closest-events clearfix">
                    <div class="closest-events__heading">
                        <h2 class="title"><?=Html::encode(SiteController::getOption('events_header'))?></h2>
                        <p><?=Html::encode(SiteController::getOption('events_sub'))?></p>
                    </div>
                    <?php foreach($events as $event): ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="closest-events__item">
                            <div class="image"><img src="<?=$event->getImage()->getUrl('301x161')?>" alt=""></div>
                            <div class="caption">
                                <h3 class="closest-events__item__title"><?=Html::encode($event->title_ru)?></h3>
                                <p class="closest-events__item__desc"><?=StringHelper::truncateWords(Html::encode(strip_tags(html_entity_decode($event->content_ru))), 21) ?></p>
                                <p class="closest-events__item__details"><span>Дата:</span> <?php $date = new DateTime($event->date); echo $date->format('d.m.Y'); ?></p>
                                <p class="closest-events__item__details"><span>Место:</span> <?=Html::encode($event->place_ru)?></p>
                                <div class="text-center clearfix">
                                    <a href="<?=Url::to('/events/show/'.$event->id)?>" class="common-button">Узнать больше</a>
                                </div>
                            </div>
                        </div>
                    </div>  <!--closest-events__item-->
                    <?php endforeach; ?>
                </div>  <!--closest-events-->

                <div class="news clearfix">
                    <div class="news__heading">
                        <h2 class="title">Последние новости туризма</h2>
                        <p>Новости с сайта <a href="#">intrnationaltourism.com</a></p>
                    </div>
                    <?php foreach($news as $item):
                        $image = $item->getImage(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="news__item">
                            <div class="image"><img src="<?=$image->getUrl('301x161')?>" alt=""></div>
                            <div class="caption">
                                <h3 class="title"><?=Html::encode($item->title_ru)?></h3>
                                <p><?=StringHelper::truncateWords(Html::encode($item->excerpt_ru), 23) ?></p>
                                <a class="more" href="<?=Url::to(['news/show/'.$item->id])?>">Читать</a>
                            </div>
                        </div>
                    </div>  <!--news__item-->
                    <?php endforeach; ?>
                </div>  <!--news-->