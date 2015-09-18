<?php
use frontend\filters\SiteLayout;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

/* @var $this \common\components\MainView */

include_once('header.php'); ?>
<?php $this->beginBody() ?>
<div id="menu" class="main-menu collapse">
    <div class="main-menu__control">
        <button class="btn btn-menu--close collapsed" data-target="#menu" data-toggle="collapse" type="button"><p>&#10006;</p></button>
        <a class="enter" href="#">Вход</a>
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
            'items' => [
                ['label' => 'О проекте', 'url' => ['page/about']],
                ['label' => 'Консультации', 'url' => ['consult/']],
                ['label' => 'Форум', 'url' => ['forum']],
                ['label' => 'Карты', 'url' => ['maps']],
                ['label' => 'Web-камеры', 'url' => ['webcams']],
                ['label' => 'Справочник', 'url' => ['info']],
                ['label' => 'Контакты', 'url' => ['contacts']],
            ],
            'activeCssClass'=>'active',
        ]); ?>
    </nav>
</div>

<header class="header-main">
    <div class="container">
        <div class="row">
            <div class="logo valign col-lg-3 col-md-3">
                <a href="/"><h3>Турфирм<span>НЕТ</span></h3></a>
            </div><div class="grid valign col-lg-9 col-md-9 hidden-sm hidden-xs">
                <nav class="nav-menu list-unstyled clearfix">
                    <?=Menu::widget([
                        'items' => [
                            ['label' => 'О проекте', 'url' => ['/page/show/1/']],
                            ['label' => 'Консультации', 'url' => ['/page/show/2']],
                            ['label' => 'Форум', 'url' => 'http://forum.travel.dev/'],
                            ['label' => 'Карты', 'url' => ['/maps/']],
                            ['label' => 'Web-камеры', 'url' => ['/webcams/index']],
                            ['label' => 'Справочник', 'url' => ['/page/show/3']],
                            ['label' => 'Контакты', 'url' => ['page/show/4']],
                        ],
                        'activeCssClass'=>'active',
                        'activateParents'=>true,
                        'activateItems'=>true
                    ]); ?>
                </nav>
                <button type="button" class="btn btn-sm">Вход</button>
            </div> <!--grid-->
            <button class="btn btn-menu collapsed visible-xs visible-sm" data-target="#menu" data-toggle="collapse" type="button"><i class="menu-icon"></i></button>
            <?php $this->params['sidebarType'] = isset($this->params['sidebarType']) ? $this->params['sidebarType'] : 1; ?>

            <?=frontend\widgets\LeftSidebar::widget([
                'isMobile'=>true,
                'type'=>$this->params['sidebarType']
            ])?>
        </div>  <!--row-->
    </div>  <!--container-->
</header>   <!--header-main-->



<main class="main-content">
    <div class="container">
        <div class="row">
            <?=frontend\widgets\LeftSidebar::widget([
                'type'=>$this->params['sidebarType']
            ])?>
            <div class="grid col-lg-9 col-md-9 ">
                <?php if(isset($this->params['breadcrumbs'])): ?>
                <?=
                Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => Yii::t('yii', 'Главная'),
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => $this->params['breadcrumbs'],
                   ])
                ?>
                <?php endif; ?>

                <?= $content ?>

            </div>  <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</main> <!--main-content-->

<?php include_once('footer.php');?>

