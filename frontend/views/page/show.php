<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = $this->title;
?>

                <div class="consultations">
                    <div class="container">
                        <div class="row">
                            <div class="main-content__heading">
                                <h3 class="title">
                                    <?=Html::encode($model->title_ru)?>
                                </h3>
                            </div>  <!--main-content__heading-->
                            <div class="consultations__block">
                                <?=Html::decode($model->content_ru)?>
                            </div>  <!--consultations__block-->
                        </div>
                    </div>
                </div>  <!--web-cams-page-->

