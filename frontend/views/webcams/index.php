<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Web-камеры';
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
                </div>
                <div class="web-cameras">
                    <div class="container">
                        <div class="row">
                            <div class="main-content__heading">
                                <h3 class="title">
                                    <?=Html::encode($this->title);?>
                                </h3>
                            </div>  <!--main-content__heading-->
                            <?php foreach($models as $model):
                                $image = $model->getImage(); ?>
                            <div class="web-cameras__item-wrapper col-lg-4 col-md-4">
                                <div class="web-cameras__item clearfix">
                                    <div class="image"><img src="<?=$image->getUrl('280x210'); ?>" alt=""></div>
                                    <div class="caption">
                                        <h4 class="title"><?=$model->title_ru; ?></h4>
                                        <p><?=BaseStringHelper::truncateWords($model->description_ru, 22)?></p>
                                        <a href="#" class="common-button common-button--thin">Посмотреть</a>
                                    </div>
                                </div>  <!--web-cameras__item-->
                            </div>
                            <?php endforeach; ?>
                            <a href="#" class="common-button load-more-btn common-button--thin">Загрузить еще</a>
                        </div>
                    </div>
                </div>  <!--web-cameras-->
            </div>  <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</main> <!--main-content-->

