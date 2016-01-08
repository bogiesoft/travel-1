<?php
use yii\helpers\Html;
?>

<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="filter-block__categories">
        <button type="button" class="btn common-button"><?=\frontend\controllers\SiteController::getOption('tour_variant')?></button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($categories as $category){ ?>
            <li><a href="<?=\yii\helpers\Url::to('/tours/category/'.$category->id)?>" data-category-id="<?=$category->id?>"><?=Html::encode($category->title_ru)?></a></li>
            <?php } ?>

        </ul>
    </div>  <!--filter-block__categories-->

    <div class="filter-block__categories aside-block__categories--country">
        <button type="button" class="btn common-button">Город</button>
        <ul class="aside-block__categories__list list-unstyled">
            <?php foreach($countries as $country): ?>
                <li>
                    <a href="<?=\yii\helpers\Url::to('/tours/city/'.$country->id)?>" data-country-id="<?=$country->id?>"><?=Html::encode($country->title_ru)?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>  <!--aside-block__categories-->
</aside>    <!--aside-block-->