<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\controllers\SiteController;

$this->title = $model->title_ru;
$this->params['sidebarType'] = 3;
$this->params['breadcrumbs'][] = ['label' => 'Каталог туров', 'url' => ['/tours/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .schedule .panel-heading a {
        height: auto;
    }
    .tour-legend-details p {
        display: inline;
    }
</style>

<style>
    .tour-legend-details {
        padding: 10px 0 10px 4px;
    }
</style>

<div class="tour-legend-page">
    <div class="container">
        <div class="row">
            <div class="main-content__heading text-uppercase">
                <h3 class="title text-left">
                    легенда ТУРА: <span><?=Html::encode($model->title_ru)?></span>
                </h3>
            </div>  <!--main-content__heading-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="location">
                    <?php foreach($model->getCitiesCustom($model->id) as $key => $city): ?>
                    <div class="location__point<?=($key+1)%2 ? ' active':''?>">
                        <?=($key+1)%2 ? '<i></i>':''?>
                        <p><?=Html::encode($city['title_ru'])?></p>
                        <?=($key+1)%2 ? '':'<i></i>'?>
                    </div>
                    <?php endforeach; ?>

                </div>
                <section class="event-slider">
                    <ul id="image-gallery" class="without-thumbs gallery list-unstyled cS-hidden">
                        <?php
                        if($model->getImages()):
                        foreach($model->getImages() as $image): ?>
                        <li>
                            <img src="<?=$image ? $image->getUrl('400x260'):''?>" />
                        </li>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </section>  <!--event-slider-->
                <div class="tour-details">
                    <ul class="list-unstyled">
                        <li><p><span>Автор:</span> <?=Html::encode($model->userdata->firstname)?> <?=Html::encode($model->userdata->lastname)?></p></li>
                        <li><p><span>При поддержке:</span> <?=Html::encode($model->support)?>  </p></li>
                        <li><p><span>Категории:</span> <?=implode(', ', \yii\helpers\ArrayHelper::map($model->categories, 'id', 'title_ru'))?></p></li>
                        <li><p><span>Длительность:</span> <?=$model->duration?> </p></li>

                    </ul>
                </div>  <!--tour-details-->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="select-day nav nav-tabs">
                    <?php foreach($model->days as $k => $day){ $k++; ?>
                    <li <?=$k == 1 ? 'class="active"' : ''; ?>><a href="#day<?=$k?>" data-toggle="tab">День <?=$k?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-content">
                    <?php foreach($model->days as $k => $day): $k++; ?>
                    <div class="tab-pane <?=$k==1 ? 'active':'';?>" id="day<?=$k?>"><p>
                        <div class="schedule">
                            <div class="panel-group" id="tour-legend" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                <?php foreach($day->schedule as $e => $element):
                                    foreach($element->variants as $v => $variant): ?>
                                        <div class="panel-heading <?=$v?'another-variant':''?>" role="tab" id="tab<?='d'.$k.'e'.$e.'v'.$v?>">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#tab<?='d'.$k.'e'.$e.'v'.$v?>" href="#tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse" aria-expanded="false" aria-controls="tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse">
                                                <div class="schedule__point <?=$v?'invisible':''?>">
                                                    <p><b><?=$variant->label?></b></p>
                                                </div>
                                                <h4 class="panel-title">
                                                    <?=$variant->header?>
                                                </h4>
                                                <div class="panel-collapse-state">
                                                    <p class="panel-collapse-state__in">Свернуть</p>
                                                    <p>Подробнее</p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php if(!empty($variant->object)): ?>
                                        <div id="tab<?='d'.$k.'e'.$e.'v'.$v?>-collapse" class="panel-collapse collapse" aria-expanded="false" role="tabpanel" aria-labelledby="tab<?='d'.$k.'e'.$e.'v'.$v?>">
                                            <div class="panel-body schedule__place">
                                                <?php foreach($variant->object->fields as $field){
                                                    $hidden = \common\models\FieldsToHide::findOne([
                                                        'object_field_id'=>$field->id,
                                                        'tour_id'=>$model->id
                                                    ]);
                                                    if(!$hidden): ?>
                                                    <div class="tour-legend-details">
                                                        <?=$field->type['icon']?'<i class="'.$field->type['icon'].'"></i>':''?>
                                                        <p><?=$field->type['icon'] == 'icon icon-link' ? Html::a($field->content, $field->content) : $field->content?></p>
                                                    </div>
                                                <?php endif;
                                                    } ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                                </div>
                                </div>

                            </div>

                        </div>  <!--schedule-->
                    <?php endforeach; ?>
                </div>  <!--tab-content-->
                <div class="text-center">
                    <br>
                    <?php if(Yii::$app->user->identity): ?>
                    <a href="#modal" class="modal-btn common-button common-button--solid load-more-btn">Подтвердить бронирование</a>
                    <?php else: ?>
                        Для подтверждения бронирования вам нужно <a href="#enter-cabinet" class="modal-btn">зарегистрироваться</a>, либо <a
                            href="#enter-cabinet" class="modal-btn">войти</a>
                    <?php endif; ?>
                </div>
                <?php if($codes && Yii::$app->user->identity && $model->pdf): ?>
                    <br>
                    <div class="text-center">
                        <a href="<?=$model->pdf?>" class="common-button common-button--solid load-more-btn" target="_blank">PDF файл маршрута</a>
                    </div>
                <?php endif; ?>
                <?php if($codes): ?>
                <div class="confirmed">
                    <div class="confirmed__heading">
                        <h4 class="title">ПОДТВЕРЖДЕННЫЕ БРОНИРОВАНИЯ</h4>
                    </div>

                    <div class="reservation">
                        <div class="panel-group" id="confirmed-reservation" role="tablist" aria-multiselectable="true">

                            <?php foreach($codes as $key => $code): ?>
                                <div class="panel panel-default<?=!$key?' active':''?>">
                                    <div class="panel-heading" role="tab" id="reserv-tab1">
                                        <i class="icon icon-hotel"></i>
                                        <p><?=Html::encode($code->object->title_ru)?></p>
                                        <a class="common-button" role="button" data-toggle="collapse" data-parent="#reserv-tab<?=$code->object->id?>" href="#reserv-tab<?=$code->object->id?>-collapse" aria-expanded="true" aria-controls="reserv-tab<?=$code->object->id?>-collapse">
                                            Подробнее
                                        </a>
                                    </div>  <!--panel-heading-->
                                    <div id="reserv-tab<?=$code->object->id?>-collapse" class="panel-collapse collapse<?=!$key?' in':''?>" role="tabpanel" aria-labelledby="reserv-tab<?=$code->object->id?>">
                                        <div class="panel-body">
                                            <?=Html::decode($code->object->description_ru)?>
                                            <div class="reservation-address">
                                                <p><b>Место нахождения:</b></p>
                                                <?=Html::decode($code->object->place_ru)?>
                                            </div>
                                            <div class="reservation-address how-get">
                                                <p><b>Как добраться:</b></p>
                                                <?=Html::decode($code->object->way_ru)?>
                                            </div>
                                            <p class="tour-legend-details"><i class="icon icon-discount"></i>Скидка для членов клуба <?=Html::encode($code->object->discount)?>%</br>
                                                <i>(Способ получения скидки промокод при бронировании на сайте гостиницы)</i></p>
                                            <p class="tour-legend-details"><i class="icon icon-link"></i>Ссылка на сайт:</br>
                                                <?=Html::a($code->object->link,$code->object->link)?></p>

                                        </div>
                                    </div>  <!--panel-collapse-->
                                </div>  <!--panel-->
                            <?php endforeach; ?>

                        </div>  <!--panel-group-->


                    </div>  <!--reservation-->
                </div>  <!--confirmed-->
                <?php endif; ?>

                <div class="note">
                    <div class="note__heading">
                        <h4 class="title">Примечания</h4>
                    </div>  <!--note__heading-->
                    <div class="note__features">
                        <i class="icon icon-like"></i><p><b>В стоимость включено</b></p>
                    </div>
                    <?=Html::decode($model->incost)?>
                    <div class="note__features">
                        <i class="icon icon-dollar icon-dollar--active"></i><p><b><span>Обязательно оплачивается</span></b></p>
                    </div>
                    <?=Html::decode($model->outcost)?>
                    <div class="note__features">
                        <i class="icon icon-dollar"></i><p><b>Оплачивается по желанию</b></p>
                    </div>
                    <?=Html::decode($model->maybecost)?>
                </div>  <!--note-->
            </div>

        </div>
    </div>
</div>  <!--tour-legend-->

<?php if($open_modal){ ?>
    <script>
        $(window).load(function(){
            $('#modal').fadeIn(500);
        });
    </script>
<?php } ?>

<div id="modal" class="popup-outer">
    <div class="confirm-popup popup">
        <div class="confirm-popup__heading">
            <h3 class="title">подтверждение бронирования</h3>
            <a class="popup__close nn" href="#"></a>
        </div>
        <div class="confirm-popup__cont">
            <form method="post" action="" class="save-code">
                <input type="hidden" value="<?=Yii::$app->user->id?>" name="user_id">
                <input type="hidden" value="<?=$model->id?>" name="tour_id">
                <select id="changeObjectCategory" name="object_category_id" data-tour-id="<?=$model->id?>" class="form-control object-cat rs-select common-button common-button--thin">
                    <option value="0" default>Выбрать</option>
                    <?php foreach($object_categories as $category): ?>
                        <option value="<?=$category->id?>"><?=$category->title_ru?></option>
                    <?php endforeach; ?>
                </select><span id="step2"><select name="object_id" required class="form-control rs-select common-button common-button--thin">
                        <?php foreach($model->hotels as $object): ?>
                            <option data-city-id="<?=$object->city_id?>" data-country-id="<?=$object->country_id?>" value="<?=$object->id?>"><?=$object->title_ru?></option>
                        <?php endforeach; ?>
                </select></span>
                <div class="reservation-code">
                    <input type="text" required name="code" placeholder="Введите код бронирования">
                </div>
                <input type="submit" class="common-button " value="Подтвердить">
            </form>
        </div>
    </div>
</div>
<style>
    .popup__close.nn {
        left: auto;
    }
</style>
<div class="popup-outer" id="notify-msg">
<div class="notify-popup popup">
    <a class="popup__close nn" href="#"></a>
    <p>Место забронированно!</p>
    <p><br></p>
    <p><b class="name-object">Гостинница “Амбасадор”</b></p>
    <p><br></p>
    <p><br></p>
    <p><br></p>
    <a href="<?=Url::to('/user/view/'.Yii::$app->user->id)?>"><p>Перейти в личный кабинет</p></a>
</div>
</div>
