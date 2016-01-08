<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Web-камеры';
$this->params['sidebarType'] = 0;

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['/webcams/']];

?>

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
                                        <!--<a href="#" class="common-button common-button--thin">Посмотреть</a>-->

                                        <?=Html::a('Посмотреть', [Html::encode('webcams/show/'.$model->id)], ['class'=>'common-button common-button--thin'])?>
                                    </div>
                                </div>  <!--web-cameras__item-->
                            </div>
                            <?php endforeach; ?>
                            <?php if(!empty($models) && count($models) % 3 == 0 && count($models) % 18 == 0): ?>
                            <a href="<?=Url::to(['/webcams/', 'limit'=>$limit])?>" class="common-button load-more-btn common-button--thin">Загрузить еще</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>  <!--web-cameras-->

