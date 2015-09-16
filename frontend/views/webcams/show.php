<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = $model->title_ru;
?>
<main class="main-content">
    <div class="container">
        <div class="row">
            <aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="filter__search-field">
                    <form action="javascript: void(null);" method="post">
                        <input type="text" name="find-place" placeholder="Найти место" >
                        <input type="submit" name="" value="">
                    </form>
                </div>
                <div class="aside-block__categories aside-block__categories--country">
                    <button type="button" class="btn common-button">Страна</button>
                    <ul class="aside-block__categories__list list-unstyled">
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                        <li><a href="#">Одна из стран</a></li>
                    </ul>
                </div>  <!--aside-block__categories-->

                <div class="aside-block__categories aside-block__categories--country">
                    <button type="button" class="btn common-button">Города</button>
                    <ul class="aside-block__categories__list list-unstyled">
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>
                        <li><a href="#">Название города</a></li>

                    </ul>
                </div>  <!--aside-block__categories-->

                <div class="filter-btn-group">
                    <button type="button" class="filter-btn-group__clear btn common-button">Очистить</button>
                    <button type="button" class="filter-btn-group__show btn common-button">Показать</button>
                </div>
            </aside>    <!--aside-block-->
            <div class="grid col-lg-9 col-md-9 ">
                <div class="breadcrumb clearfix">
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Web-камеры</a></li>
                    <li><?=Html::encode($model->title_ru)?></li>
                </div>
                <div class="web-cameras-page">
                    <div class="container">
                        <div class="row">
                            <div class="main-content__heading">
                                <h3 class="title">
                                    Камера: <span><?=Html::encode($model->title_ru)?></span>
                                </h3>
                            </div>  <!--main-content__heading-->

                            <div class="live-cam clearfix">
                                <div class="live-cam__frame">

                                    <?=$model->code?>

                                </div>
                                <div class="live-cam__info">
                                    <ul class="list-unstyled">
                                        <li><p><span>Город:</span> <?=Html::encode($model->city_ru).', '.Html::encode($model->country_ru)?></p></li>
                                        <li><p><span>Часовой пояс:</span> <?=Html::encode($model->timezone)?></p></li>
                                        <li><p><span>Размер изображения:</span> <?=Html::encode($model->size_width)?>×<?=Html::encode($model->size_height)?>.</p></li>
                                    </ul>
                                    <button type="button" class="btn common-button">LIVE</button>
                                </div>
                                <div class="live-cam__desc">
                                    <h4 class="title">Описание</h4>
                                    <p><?=Html::encode($model->description_ru)?></p>
                                </div>
                            </div>  <!--live-cam-->
                            <div class="another-cams clearfix">
                                <h4 class="title">Камеры города:  <span><?=Html::encode($model->city_ru)?></span></h4>
                                <div class="row">
                                    <div class="another-cams__item col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="image">
                                            <div class="another-cams__item__place"><p>Обзорная web-камера</p></div>
                                            <img src="img/59.gif" alt="">
                                        </div>
                                    </div>

                                    <a href="#" class="common-button load-more-btn common-button--thin">Показать ещё камеры</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!--web-cams-page-->
            </div>  <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</main> <!--main-content-->