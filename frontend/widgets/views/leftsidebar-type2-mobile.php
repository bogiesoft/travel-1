<?php
use yii\helpers\Html;
?>
<div class="header-main__filter visible-sm visible-xs clearfix">
    <button class="btn common-button pull-left collapsed" data-target="#tour-variant-toggle" data-toggle="collapse" type="button">Мероприятие</button>
    <button class="btn common-button pull-right collapsed" data-target="#country-toggle" data-toggle="collapse" type="button">Страна</button>
</div>
<div id="tour-variant-toggle" class="header-main__filter__variants collapse">
    <ul class="header-main__filter__list list-unstyled">
        <?php foreach($countries as $country): ?>
            <li class="col-sm-6 col-xs-6"><a href="#"><?=Html::encode($country->title_ru)?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="country-toggle" class="header-main__filter__variants collapse">
    <ul class="header-main__filter__list list-unstyled">
        <?php foreach($categories as $category): ?>
            <li class="col-sm-6 col-xs-6"><a href="#"><?=Html::encode($category->title_ru)?></a></li>
        <?php endforeach; ?>
    </ul>
</div>