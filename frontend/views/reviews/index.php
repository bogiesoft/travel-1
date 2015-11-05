<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Отзывы';
$this->params['sidebarType'] = 1;
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/reviews/']];

?>
<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=$this->title?>
                </h3>
            </div>  <!--main-content__heading-->

            <?php foreach($models as $review){ ?>
            <div class="single-review clearfix">
                <div class="single-review__photo">
                    <?php if($review->user->getImage()): ?>
                    <img src="<?=$review->user->getImage()->getUrl('104x104')?>" alt="">
                    <?php endif ?>
                </div>
                <div class="single-review__heading">
                    <h4 class="reviewer-name"><?=$review->user->firstname.' '.$review->user->lastname?></h4>
                    <p><?=$review->user->country.', '.$review->user->city?></p>
                    <p><span>Отзыв оставлен <?php
                            $date = new DateTime($review->created_at);
                            echo \yii\helpers\RoslArrayHelper::getRusDate($date->format('Y-m-d H:i:s'));
                            ?></span></p>
                </div>
                <h4 class="review-place">
                    “<?=Html::encode($review->title_ru)?>”
                </h4>
                <div class="single-review__text">
                    <p><?=Html::decode($review->content_ru)?></p>
                </div>
            </div>  <!--single-review-->
            <?php } ?>


            <a href="#" class="common-button common-button--thin load-more-btn">Показать  еще отзывы</a>
        </div>
    </div>
</div>
