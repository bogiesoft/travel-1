<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

$this->title = 'Справочник';
$this->params['sidebarType'] = 1;

$this->params['breadcrumbs'][] = ['label' => $this->title];

?>

<div class="manual">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title">
                    <?=$this->title?>
                </h3>
            </div>  <!--main-content__heading-->

            <div class="panel-group" id="manual-menu" role="tablist" aria-multiselectable="true">
                <?php foreach($models as $model): ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="tab<?=$model->id?>">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#tab<?=$model->id?>" href="#tab<?=$model->id?>-collapse" aria-expanded="false" aria-controls="tab<?=$model->id?>-collapse">
                                <?=$model->title_ru?>
                                <i class="panel-collapse-arrow"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="tab<?=$model->id?>-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tab<?=$model->id?>">
                        <div class="panel-body">
                            <?=$model->content_ru?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>  <!--web-cams-page-->
