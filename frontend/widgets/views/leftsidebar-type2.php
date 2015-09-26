<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
    .aside-block__categories__list {
        height: auto;
        max-height: 420px;
        margin-right: 0;
    }
    .mCustomScrollBox {
        height: auto;
    }
    .aside-block__categories--country li.active {
        background-color: #006795;
    }
    .aside-block__categories--country li.active a {
        color: #fff;
    }
</style>
<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="filter-block__categories aside-block__categories--blue">
        <button type="button" class="btn common-button">Страна</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($countries as $country): ?>
            <li><a href="#"><?=Html::encode($country->title_ru)?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--filter-block__categories-->
    <div class="filter-block__categories aside-block__categories--blue">
        <button type="button" class="btn common-button">Мероприятие</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($categories as $category): ?>
                <li><a href="#"><?=Html::encode($category->title_ru)?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--filter-block__categories-->
    <div class="filter-btn-group no-margin">
        <button type="button" class="filter-btn-group__clear btn common-button">Очистить</button>
        <button type="button" class="filter-btn-group__show btn common-button">Показать</button>
    </div>
</aside>    <!--aside-block-->