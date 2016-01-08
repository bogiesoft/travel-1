<?php
use frontend\controllers\SiteController;
use yii\helpers\Url;
?>
<?php
                    $menu_items = \common\models\MenuItems::find()->orderBy('order ASC')->all();
                    $mitems = [];
                    foreach($menu_items as $item) {
                        $mitems[] = [
                            'label' => $item->title, 'url' => $item->link
                        ];
                    }
                ?>
<footer class="footer-main">
    <div class="footer-main__corner"></div>
    <div class="footer-main__corner-border"></div>
    <div class="container">
        <div class="row">
            <div class="footer__logo col-lg-3 col-md-3 hidden-sm hidden-xs">
                <h3 class="title"><a href="/">ТурфирмНЕТ</a></h3>
            </div>
            <div class="grid col-lg-9 col-md-9">
                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
                    <h4 class="title">Навигация</h4>
                    <ul class="footer-main__navigation list-unstyled">
                        <?=\yii\widgets\Menu::widget([
                            'items' => $mitems,
                            'activeCssClass'=>'active',
                            'activateParents'=>true,
                            'activateItems'=>true,
                            //'linkTemplate'=> '<li><p><a href="{url}">{label}</a></p></li>',
                            'options'=>[
                                'tag'=>false
                            ]
                        ]); ?>
                    </ul>
                </div>
                <div class="footer-main__subscribe-us text-center clearfix col-lg-4 col-md-4">
                    <h4 class="title">ПОДПИСЫВАЙТЕСЬ НА НАС</h4>
                    <ul class="footer-main__subscribe list-unstyled">
                        <li><a href="<?=Url::to(SiteController::getOption('twitter_link'))?>"><i class="icon-tw"></i>Twitter</a></li>
                        <li><a href="<?=Url::to(SiteController::getOption('facebook_link'))?>"><i class="icon-fb"></i>Facebook</a></li>
                        <li><a href="<?=Url::to(SiteController::getOption('google_link'))?>"><i class="icon-goog"></i>Google+</a></li>
                    </ul>
                    <div class="contacts visible-xs visible-sm pull-right">
                        <p><i class="icon-phone"></i><?=SiteController::getOption('contact_phone')?></p>
                        <p><i class="icon-mail"></i><?=SiteController::getOption('contact_email')?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <form class="contact-us" method="post" action="javascript: void(null);">
                        <h4 class="title">СВЯЖИТЕСЬ С НАМИ</h4>
                        <input type="text" required class="contact-us__field" name="name" placeholder="Ваше имя">
                        <input type="email" required class="contact-us__field" name="mail" placeholder="E-mail">
                        <textarea class="contact-us__field" required placeholder="Напишите Ваше сообщение" name="message"></textarea>
                        <input type="submit" class="contact-us__submit" value="Отправить">
                    </form>
                </div>
                <div class="col-lg-2 col-md-3 hidden-sm hidden-xs">
                    <div class="contacts">
                        <p><i class="icon-phone"></i><?=SiteController::getOption('contact_phone')?></p>
                        <p><i class="icon-mail"></i><?=SiteController::getOption('contact_email')?></p>
                    </div>
                </div>
            </div> <!--grid-->
        </div>  <!--row-->
    </div>  <!--container-->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>