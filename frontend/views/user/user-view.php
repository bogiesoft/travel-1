<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $user common\models\User */

$this->title = $model->username;
$user = Yii::$app->user->identity;
if($user->email_verification_status == User::EMAIL_NOT_VERIFIED):?>
    <br>
    <p>
        <?php echo Yii::t('message','Вы не подтвердили свой e-mail. ')?>
        <a href="<?=Url::to('/user/get-verification-mail')?>"><?php echo Yii::t('messages','Выслать код еще раз')?></a>
    </p>
<?php endif?>
<div class="user-view">

    <h1 class="text-center"><?=$userdata->firstname ? Html::encode($userdata->firstname.' '.$userdata->lastname):''?></h1>

    <div class="row">
        <div class="col-md-3 text-right"><img src="<?= $userdata->getImage()->getUrl('150x200') ?>" alt=""></div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4><?=Html::encode($model->email)?> (<?=Html::encode($model->username)?>)</h4>
                </div>
                <div class="col-md-12">
                    <h5><?=Html::encode($userdata->country)?>, <?=Html::encode($userdata->city)?></h5>
                </div>
                <div class="col-md-12">
                    <h5>Возможность предложить тур: <?=$userdata->can_moderate ? 'Да' : 'Нет'?></h5>
                </div>
            </div>
        </div>
    </div>



</div>
