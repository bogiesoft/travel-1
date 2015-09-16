<?php
use frontend\filters\SiteLayout;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \common\components\MainView */

include_once('header.php');
?>
<?php $this->beginBody() ?>
<div id="menu" class="main-menu collapse">
    <div class="main-menu__control">
        <button class="btn btn-menu--close collapsed" data-target="#menu" data-toggle="collapse" type="button"><p>&#10006;</p></button>
        <a class="enter" href="#">Вход</a>
    </div>
    <nav class="nav-menu list-unstyled clearfix">
        <li><a href="#">О проекте</a></li>
        <li><a href="#">Консультации</a></li>
        <li><a href="#">Форум</a></li>
        <li><a href="#">Карты</a></li>
        <li><a href="#">Web-камеры</a></li>
        <li><a href="#">Справочник</a></li>
        <li><a href="#">Контакты</a></li>
    </nav>
</div>

<header class="header-main">
    <div class="container">
        <div class="row">
            <div class="logo valign col-lg-3 col-md-3">
                <a href="index.html"><h3>Турфирм<span>НЕТ</span></h3></a>
            </div><div class="grid valign col-lg-9 col-md-9 hidden-sm hidden-xs">
                <nav class="nav-menu list-unstyled clearfix">
                    <li><a href="#">О проекте</a></li>
                    <li><a href="#">Консультации</a></li>
                    <li><a href="#">Форум</a></li>
                    <li><a href="#">Карты</a></li>
                    <li><a href="#">Web-камеры</a></li>
                    <li><a href="#">Справочник</a></li>
                    <li><a href="#">Контакты</a></li>
                </nav>
                <button type="button" class="btn btn-sm">Вход</button>
            </div> <!--grid-->
            <button class="btn btn-menu collapsed visible-xs visible-sm" data-target="#menu" data-toggle="collapse" type="button"><i class="menu-icon"></i></button>
            <div class="header-main__filter visible-sm visible-xs clearfix">
                <button class="btn common-button pull-left collapsed" data-target="#tour-variant-toggle" data-toggle="collapse" type="button">Вариант тура</button>
                <button class="btn common-button pull-right collapsed" data-target="#country-toggle" data-toggle="collapse" type="button">Страна</button>
            </div>
            <div id="tour-variant-toggle" class="header-main__filter__variants collapse">
                <ul class="header-main__filter__list list-unstyled">
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Название категории тура</a></li>
                </ul>
            </div>
            <div id="country-toggle" class="header-main__filter__variants collapse">
                <ul class="header-main__filter__list list-unstyled">
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>
                    <li class="col-sm-6 col-xs-6"><a href="#">Одна из стран</a></li>

                </ul>
            </div>
        </div>  <!--row-->
    </div>  <!--container-->
</header>   <!--header-main-->

<?= $content ?>

<?php include_once('footer.php');?>

