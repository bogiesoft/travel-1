<?php
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\components\RoslPhpBbClass;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $user common\models\User */

$this->title = "Сообщения в форум";
$user = Yii::$app->user->identity;
$this->params['sidebarType'] = -1;
$this->params['fullLayout'] = true;
$forum_link = 'http://forum.travel.alltoall.info/';
$smiles_path = $forum_link.'images/smilies/';

?>
<script type="text/javascript">


    $(document).ready(function(){

        var current_width = $(window).width();
        //do something with the width value here!
        if(current_width < 719){
            var content = $('.row_th span').html();
            var content1 = $('.for_per').html();
            var content2 = $('.for_per2').html();
            var content3 = $('.mess_forum th:last-child').html();
            var content4 = $('.mess_forum td.text-msg_form').html();
            $('.row_th span.usr').hide();
            $('.for_per').hide();
            $('.for_per2').hide();
            $('.for_per_th').hide();
            $('.usr_mess .row_otp').before('<tr class="new_row"><td><table class="intbl"><tr><td><span>' +content+ '</span></td><td>' +content1+ '</td><td>'+content2+'</td></tr></table></td></tr>');

            $('.mess_forum th').append(' / '+content3+'');
            $('.mess_forum th:last-child').hide();
            $('.mess_forum td.text-msg_form').addClass("hide_td");
            $('.mess_forum td.text-zag_form p').remove();
            $('.mess_forum td.text-zag_form').append(content4);
            $('.btn_one').addClass("active");

        }
        else {

            $('.new_row').remove();
            $('.row_th span').show();
            $('.for_per').show();
            $('.for_per2').show();
            $('.for_per_th').show();
            $(".btn_tw").removeClass("active");
            $('.theme_block').show();
            $('.zag').show();
            $('.zag_msg').show();
            $('.mess_block').show();
            $('.mess_forum th:last-child').show();
            $('.mess_forum td.text-msg_form').show();
        };



        $(".btn_tw").click(function () {
            $(".btn_one").removeClass("active");
            $('.zag').hide();
            $('.tour_forum').hide();
            $('.zag_msg').show();
            $('.mess_block').show();
            $(this).addClass("active");
        });

        $(".btn_one").click(function () {
            $(".btn_tw").removeClass("active");
            $('.mess_block').hide();
            $('.zag_msg').hide();
            $('.theme_block').show();
            $('.zag').show();
            $(this).addClass("active");
        });
    });


    $(window).resize(function(){
        var current_width = $(window).width();
        //do something with the width value here!
        if(current_width < 719){
            var content = $('.row_th span').html();
            var content1 = $('.for_per').html();
            var content2 = $('.for_per2').html();
            var content3 = $('.mess_forum th span').html();
            var content4 = $('.mess_forum td.text-msg_form').html();
            $('.row_th span.usr').hide();
            $('.for_per').hide();
            $('.for_per2').hide();
            $('.for_per_th').hide();
            $('.new_row').remove();
            $('.usr_mess .row_otp').before('<tr class="new_row"><td><table class="intbl"><tr><td><span>' +content+ '</span></td><td>' +content1+ '</td><td>'+content2+'</td></tr></table></td></tr>');


            $('.mess_forum th span').append('<span class="del">/ '+content3+'</span>');
            $('.mess_forum th span.del').remove();
            $('.mess_forum th:last-child').addClass("hide_td");
            $('.onooff').show();
            $('.mess_forum td.text-msg_form').addClass("hide_td");
            $('.mess_forum td.text-zag_form p').remove();
            $('.mess_forum td.text-zag_form').append(content4);

        }
        else {
            $('.new_row').remove();
            $('.row_th span').show();
            $('.for_per').show();
            $('.for_per2').show();
            $('.for_per_th').show();
            $(".btn_tw").removeClass("active");
            $('.theme_block').show();
            $('.zag').show();
            $('.zag_msg').show();
            $('.mess_block').show();
            $('.mess_forum th:last-child').removeClass("hide_td");
            $('.mess_forum th:last-child').append(content3);
            $('.onooff').hide();
            $('.mess_forum td.text-zag_form p').remove();
            $('.mess_forum td.text-msg_form').removeClass("hide_td");
        }
    });



</script>

<div class="personal-cabinet col-lg-10 col-md-12">
    <div class="container">
        <div class="row">
            <div class="main-content__heading">
                <h3 class="title text-left zag">
                    Обсуждения <span>форум</span>
                </h3>
            </div>  <!--main-content__heading-->
            <div class="tour_forum theme_block">
                <table class="table usr_mess">
                    <thead>
                    <tr>
                        <th>Тема</th>
                        <th class="for_per_th">Количество</th>
                        <th class="for_per_th">Последний автор</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($topics as $topic): ?>
                    <tr class="row_th">
                        <td><a href="<?=Url::to($forum_link.'viewtopic.php?f='.$topic->topic->forum_id.'&t='.$topic->topic_id)?>"><?=$topic->topic->topic_title?> <span class="usr"><?=$topic->topic->topic_first_poster_name?>, <?php $date = new DateTime('@'.$topic->topic->topic_time); echo $date->format('d.m.Y m:H'); ?></span></a></td>
                        <td class="for_per"><p>Ответов: <a href=""<?=Url::to($forum_link.'viewtopic.php?f='.$topic->topic->forum_id.'&t='.$topic->topic_id)?>"><?=$topic->topic->topic_posts_approved?></a></p> <p>Просмотров: <a href="<?=Url::to($forum_link.'viewtopic.php?f='.$topic->topic->forum_id.'&t='.$topic->topic_id)?>"><?=$topic->topic->topic_views?></a></p></td>
                        <td class="for_per2"><a href="<?=Url::to($forum_link.'viewtopic.php?f='.$topic->topic->forum_id.'&t='.$topic->topic_id.'&p='.$topic->topic->topic_last_post_id.'#p'.$topic->topic->topic_last_post_id)?>" class="last_mess"><?=$topic->topic->topic_last_poster_name?></a> <span class="datetime"><?php $date = new DateTime('@'.$topic->topic->topic_last_post_time); echo $date->format('d.m.Y, m:H') ?></span></td>
                    </tr>
                    <tr class="row_otp">
                        <td colspan="3"></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="stat_theme">
                    Всего тем: <?=count($topics)?> шт
                </div>
                <!--<div class="paginator">
                    <a href="#"><<</a> <span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">...</a> <a href="#">122</a> <a href="#">>></a>
                </div>-->
                <div class="clear"></div>
                <div class="more_msg">
                    <a href="#">Загрузить еще темы</a>
                </div>
            </div>


            <div class="main-content__heading">
                <h3 class="title text-left zag_msg">
                    Ваши сообщения
                </h3>
            </div>
            <div class="tour_forum mess_block">
                <table class="table mess_forum">
                    <thead>
                    <tr>
                        <th>Тема <span class="onooff">/ Сообщение</span></th>
                        <th><span>Сообщение</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="row_otp">
                        <td colspan="3"></td>
                    </tr>
                    <?php foreach($messages as $message): ?>
                    <tr>
                        <td class="text-zag_form"><a href="<?=Url::to($forum_link.'viewtopic.php?f='.$message->topic->forum_id.'&t='.$message->topic_id.'&p='.$message->topic->topic_last_post_id.'#p'.$message->topic->topic_last_post_id)?>"><?=$message->topic->topic_title; ?> <span><?php $date = new DateTime('@'.$message->post_time); echo $date->format('d.m.Y m:H') ?></span></a></td>
                        <td class="text-msg_form">
                            <p><?=RoslPhpBbClass::fix_smiles($message->post_text, $smiles_path)?></p>
                        </td>
                    </tr>
                    <tr class="row_otp">
                        <td colspan="3"></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="stat_theme">
                    Всего сообщений: <?=count($messages)?> шт
                </div>
                <!--<div class="paginator">
                    <a href="#"><<</a> <span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">>></a>
                </div>
                <div class="clear"></div>
                <div class="more_msg">
                    <a href="#">Загрузить еще сообщения</a>
                </div>-->
            </div>
            <!--add_tour-->
        </div>  <!--row-->
    </div>
</div>  <!--personal-cabinet-->
