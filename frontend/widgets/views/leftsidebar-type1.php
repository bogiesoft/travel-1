<?php
use yii\helpers\Html;
?>

<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="filter-block__categories">
        <button type="button" class="btn common-button">Вариант тура</button>
        <ul class="aside-block__categories__list list-unstyled">
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
            <li><a href="#">Название категории тура</a></li>
        </ul>
    </div>  <!--filter-block__categories-->

    <div class="filter-block__categories aside-block__categories--country">
        <button type="button" class="btn common-button">Страна</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($countries as $country): ?>
                <li>
                    <a href="" data-country-id="<?=$country->id?>"><?=Html::encode($country->title_ru)?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--aside-block__categories-->
</aside>    <!--aside-block-->