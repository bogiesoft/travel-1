<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
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
    <div class="filter__search-field">
        <form action="/webcams/find" method="get">
            <input type="text" name="title" placeholder="Найти место" >
            <input type="submit" name="" value="">
        </form>
    </div>
    <div class="webcamAside filter-block__categories aside-block__categories--country countryList">
        <button type="button" class="btn common-button">Страна</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($countries as $country): ?>
                <li>
                    <a href="" data-country-id="<?=$country->id?>"><?=Html::encode($country->title_ru)?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--aside-block__categories-->

    <div class="webcamAside filter-block__categories aside-block__categories--country cityList">
        <button type="button" class="btn common-button">Города</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($cities as $city): ?>
                <li>
                    <a href="" data-city-id="<?=$city->id?>"><?=Html::encode($city->title_ru)?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--aside-block__categories-->

    <div id="webcamsSidebarBtns" class="filter-btn-group hidden">
        <button type="button" class="filter-btn-group__clear btn common-button">Очистить</button>
        <a href="" id="sortWebcams" type="button" class="filter-btn-group__show btn common-button">Показать</a>
    </div>

</aside>    <!--aside-block-->
