<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
?>
<div class="header-main__filter visible-sm visible-xs clearfix">
    <button class="btn common-button pull-left collapsed" data-target="#country-toggle" data-toggle="collapse" type="button">Страна</button>
    <button class="btn common-button pull-right collapsed" data-target="#city-toggle" data-toggle="collapse" type="button">Город</button>
    <div class="filter__search-field visible-sm">
        <form action="/webcams/find" method="get">
            <input type="text" name="title" placeholder="Найти место" >
            <input type="submit" name="" value="">
        </form>
    </div>
</div>
<div id="country-toggle" class="header-main__filter__variants collapse">
    <ul class="header-main__filter__list list-unstyled">
        <?php foreach($countries as $country): ?>
            <li>
                <a href="" data-country-id="<?=$country->id?>"><?=Html::encode($country->title_ru)?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="city-toggle" class="header-main__filter__variants collapse">
    <ul class="header-main__filter__list list-unstyled">
        <?php foreach($cities as $city): ?>
            <li>
                <a href="" data-city-id="<?=$city->id?>"><?=Html::encode($city->title_ru)?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>