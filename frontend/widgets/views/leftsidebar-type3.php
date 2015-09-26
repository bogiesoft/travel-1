<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="filter-block__categories aside-block__categories--blue">
        <button type="button" class="btn common-button">Мероприятия</button>
        <div class="aside-block__events__list">
            <?php foreach($events as $event):
                $image = $event->getImage();
                ?>
            <div class="aside-block__event">
                <div class="image">
                    <img src="<?=$image->getUrl('285x160')?>" alt="">
                </div>
                <div class="caption">
                    <h4 class="title"><?php $date = new DateTime($event->date); echo $date->format('d.m'); ?></h4>
                    <a href="<?=Url::to('/events/show/'.$event->id)?>"><?=Html::encode($event->title_ru)?></a>
                </div>
            </div>  <!--aside-block__event-->
            <?php endforeach; ?>
            <a href="<?=Url::to('/events/')?>" class="common-button common-button--solid load-more-btn">Больше мероприятий</a>
        </div>  <!--aside-block__events__list-->

        <button type="button" class="btn common-button">Отзывы</button>

        <div class="aside-block__reviews__list">
            <div class="aside-block__review">
                <p>Не следует, однако забывать, что постоянный количественный рост
                    и сфера нашей активности представляет собой интересный эксперимент
                    проверки модели развития.</p>
                <p><span>Анна</span></p>
            </div>  <!--aside-block__review-->
            <div class="aside-block__review">
                <p>Не следует, однако забывать, что постоянный количественный рост
                    и сфера нашей активности представляет собой интересный эксперимент
                    проверки модели развития.</p>
                <p><span>Анна</span></p>
            </div>  <!--aside-block__review-->
            <div class="aside-block__review">
                <p>Не следует, однако забывать, что постоянный количественный рост
                    и сфера нашей активности представляет собой интересный эксперимент
                    проверки модели развития.</p>
                <p><span>Анна</span></p>
            </div>  <!--aside-block__review-->
            <a href="#" class="common-button common-button--solid load-more-btn">Больше отзывов</a>
        </div>  <!--aside-block__reviews__list-->
    </div>  <!--filter-block__categories-->
</aside>    <!--aside-block-->