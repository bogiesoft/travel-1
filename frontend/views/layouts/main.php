<?php
use frontend\filters\SiteLayout;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\web\User;
use yii\bootstrap\ActiveForm;
/* @var $this \common\components\MainView */

include_once('header.php'); ?>
<?php $this->beginBody() ?>
<?php $user = \Yii::$app->user->identity; ?>

<?php
$menu_items = \common\models\MenuItems::find()->orderBy('order ASC')->all();
$mitems = [];
foreach($menu_items as $item) {
    $mitems[] = [
        'label' => $item->title, 'url' => $item->link
    ];
}
?>
<script>
    var user_id = <?= Yii::$app->user->id ? Yii::$app->user->id : 0; ?>;
</script>
<div id="menu" class="main-menu collapse">
    <div class="main-menu__control">
        <button class="btn btn-menu--close collapsed" data-target="#menu" data-toggle="collapse" type="button"><p>&#10006;</p></button>
        <a class="enter<?php echo $user ?  '' : ' modal-btn'; ?>" href="#<?php echo $user ?  '' : 'enter-popup'; ?>"><?php echo $user ? $user->username : 'Вход'; ?></a>
    </div>
    <nav class="nav-menu list-unstyled clearfix">
<!--        <li><a href="#">О проекте</a></li>
        <li><a href="#">Консультации</a></li>
        <li><a href="#">Форум</a></li>
        <li><a href="#">Карты</a></li>
        <li><a href="#">Web-камеры</a></li>
        <li><a href="#">Справочник</a></li>
        <li><a href="#">Контакты</a></li>-->

        <?=Menu::widget([
            'items' => $mitems,
            'activeCssClass'=>'active',
        ]); ?>
    </nav>
</div>

<header class="header-main">
    <div class="container">
        <div class="row">
            <div class="logo col-lg-3 col-md-3 valign">
                <a href="/"><h3>Турфирм<span>НЕТ</span></h3></a>
            </div>
            <div class="grid valign col-lg-9 col-md-9 hidden-sm hidden-xs">
                <!--<nav class="nav-menu list-unstyled clearfix">-->

                    <?=Menu::widget([
                        'items' => $mitems /*[
                            ['label' => 'О проекте', 'url' => ['/page/show/1/']],
                            ['label' => 'Консультации', 'url' => ['/page/show/2']],
                            ['label' => 'Форум', 'url' => 'http://forum.travel.alltoall.info/'],
                            ['label' => 'Карты', 'url' => ['/maps/']],
                            ['label' => 'Web-камеры', 'url' => ['/webcams/index']],
                            ['label' => 'Справочник', 'url' => ['/faq']],
                            ['label' => 'Контакты', 'url' => ['page/show/4']],
                        ]*/,
                        'activeCssClass'=>'active',
                        'activateParents'=>true,
                        'activateItems'=>true,
                        'options'=>[
                            'class'=>'nav-menu list-unstyled clearfix'
                        ]
                    ]); ?>
                <!--</nav>-->
                <button type="button" class="btn btn-sm"><?php echo $user ? \yii\helpers\Html::a($user->username, ['user/view/']) : '<a href="#enter-cabinet" class="modal-btn">Вход</a>'; ?></button>
            </div> <!--grid-->
            <button class="btn btn-menu collapsed visible-xs visible-sm" data-target="#menu" data-toggle="collapse" type="button"><i class="menu-icon"></i></button>
            <?php $this->params['sidebarType'] = isset($this->params['sidebarType']) ? $this->params['sidebarType'] : 1; ?>

            <?=$this->params['sidebarType'] != -1 ? frontend\widgets\LeftSidebar::widget([
                'isMobile'=>true,
                'type'=>$this->params['sidebarType']
            ]) : ''?>
        </div>  <!--row-->
    </div>  <!--container-->
</header>   <!--header-main-->



<main class="main-content">
    <div class="container">
        <div class="row">
            <?=frontend\widgets\LeftSidebar::widget([
                'type'=>$this->params['sidebarType'],
                'item_id'=>!empty($this->params['item_id']) ? $this->params['item_id'] : 0,
            ])?>
            <?php if($this->title == 'Карты' || !empty($this->params['fullLayout'])) {
            $bcClass = 'breadcrumb breadcrumb--offset-with clearfix'; ?>
            <div class="grid col-lg-12 col-md-12 ">
                <?php } else if(!empty($this->params['layoutClass'])) { ?>
                    <div class="<?=$this->params['layoutClass']?>">
                <?php } else {
                $bcClass = 'breadcrumb'; ?>
                <div class="grid col-lg-9 col-md-9">

                <?php } ?>
                <?php if(isset($this->params['breadcrumbs'])): ?>
                <?=
                Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => Yii::t('yii', 'Главная'),
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => $bcClass]
                   ])
                ?>
                <?php endif; ?>

                <?= $content ?>

                </div>  <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</main> <!--main-content-->
<style>
    .popup__close {
        z-index: 99;
        top: 10px;
        left: 10px;
    }
</style>
<div id="enter-cabinet" class="enter-popup popup popup-outer">
    <a class="popup__close" href="#"></a>
    <div class="enter-cabinet col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h4 class="title">ВХОД В ЛИЧНЫЙ КАБИНЕТ</h4>

        <?php
        $model = new \frontend\models\LoginForm();
        $form = ActiveForm::begin(['id' => 'login-form',
            'action'=>[\yii\helpers\Url::to(['/site/login'])],
            'method'=>'post'
        ]); ?>
        <?= $form->field($model, 'email')->textInput([
            'placeholder'=>'Email',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput([
            'placeholder'=>'Пароль',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <p>Зарегистрироваться через сервис:</p>
        <ul class="through-service list-unstyled clearfix">
            <li><a href="#"><i class="icon icon-facebook"></i></a></li>
            <li><a href="#"><i class="icon icon-odnoklassniki"></i></a></li>
            <li><a href="#"><i class="icon icon-vkontakte"></i></a></li>
            <li><a href="#"><i class="icon icon-googleplus"></i></a></li>
            <li><a href="#"><i class="icon icon-mailru"></i></a></li>
        </ul>
        <div class="remember">
            <?= $form->field($model, 'rememberMe')->checkbox()->label(false) ?><label for="check-remember">запомнить меня</label>
            <a href="#">Забыли пароль?</a>
        </div>

            <?= \yii\helpers\Html::submitInput('Вход', ['class' => 'common-button', 'name' => 'login-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="registration-block col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h4 class="title">Регистрация</h4>
        <?php $model = new \frontend\models\RegisterForm();
        $userdata_model = new \common\models\Userdata();

        $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'form-signup',
            'method' => 'post',
            'action' => [\yii\helpers\Url::to('/site/register')]

        ]);
        $userdata_model->can_moderate = 0;
        $userdata_model->status = 1; ?>

        <div class="hidden">
            <?= $form->field($userdata_model, 'can_moderate')->hiddenInput() ?>
            <?= $form->field($userdata_model, 'status')->hiddenInput() ?>
        </div>

        <?= $form->field($model, 'username')->textInput([
            'placeholder'=>'Логин',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput([
            'placeholder'=>'Пароль',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($model, 'passwordConfirm')->passwordInput([
            'placeholder'=>'Повтор пароля',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($userdata_model, 'firstname')->textInput([
            'placeholder'=>'Имя',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($model, 'email')->textInput([
            'placeholder'=>'Email',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>
        <?= $form->field($userdata_model, 'phone')->textInput([
            'placeholder'=>'Телефон',
            'class'=>'cabinet-input-field'
        ])->label(false) ?>

        <?= \yii\helpers\Html::submitInput(Yii::t('app','Регистрация'), ['class' => 'common-button', 'name' => 'signup-button']) ?>
        <?php \yii\bootstrap\ActiveForm::end(); ?>



        <!--<form method="post" action="javascript:void(null);" class="enter-cabinet__form">
            <input class="cabinet-input-field" type="text" name="login" placeholder="Логин">
            <input class="cabinet-input-field" type="password" name="pswd" placeholder="Пароль">
            <input class="cabinet-input-field" type="password" name="confirm-pswd" placeholder="Повтор пароля">
            <input class="cabinet-input-field" type="text" name="name" placeholder="ФИО">
            <input class="cabinet-input-field" type="text" name="mail" placeholder="E-mail">
            <input class="cabinet-input-field" type="text" name="phone" placeholder="Телефон">
            <input type="submit" class="common-button" value="Регистрация">
        </form>-->
    </div>
</div>

<style>
    #enter-cabinet {
        position: fixed;
        top: 10%;
    }
    .remember label {
        margin-right: 19px;
        margin-left: 6px;
    }
    .remember label{
        font: 14px 'Calibri';
        color: rgb(255, 255, 255);
        line-height: 1.2;
        cursor: pointer;
        display: inline-block;
        vertical-align: middle;
        margin-bottom: 0;
    }
    .remember label::before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        border: 2px solid rgb(152, 213, 224);
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        width: 18px;
        height: 18px;
        margin-right: 10px;
    }
</style>

<?php include_once('footer.php');?>

