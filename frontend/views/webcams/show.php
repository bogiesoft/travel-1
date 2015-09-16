<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = $model->title_ru;
$this->params['sidebarType'] = 0;
$this->params['breadcrumbs'][] = ['label' => 'Web-камеры', 'url' => ['/webcams/']];
$this->params['breadcrumbs'][] = $this->title;
?>

                <div class="web-cameras-page">
                    <div class="container">
                        <div class="row">
                            <div class="main-content__heading">
                                <h3 class="title">
                                    Камера: <span><?=Html::encode($model->title_ru)?></span>
                                </h3>
                            </div>  <!--main-content__heading-->

                            <div class="live-cam clearfix">
                                <div class="live-cam__frame">

                                    <?=$model->code?>

                                </div>
                                <div class="live-cam__info">
                                    <ul class="list-unstyled">
                                        <li><p><span>Город:</span> <?=Html::encode($city->title_ru).', '.Html::encode($country->title_ru)?></p></li>
                                        <li><p><span>Часовой пояс:</span> <?=Html::encode($model->timezone)?></p></li>
                                        <li><p><span>Размер изображения:</span> <?=Html::encode($model->size_width)?>×<?=Html::encode($model->size_height)?>.</p></li>
                                    </ul>
                                    <button type="button" class="btn common-button">LIVE</button>
                                </div>
                                <div class="live-cam__desc">
                                    <h4 class="title">Описание</h4>
                                    <p><?=Html::decode($model->description_ru)?></p>
                                </div>
                            </div>  <!--live-cam-->
                            <div class="another-cams clearfix">
                                <h4 class="title">Камеры города:  <span><?=Html::encode($city->title_ru)?></span></h4>
                                <div class="row">
                                    <?=frontend\widgets\CityCameras::widget(['currentCamId'=>$model->id,'cityId'=>$city->id])?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  <!--web-cams-page-->
            </div>  <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</main> <!--main-content-->