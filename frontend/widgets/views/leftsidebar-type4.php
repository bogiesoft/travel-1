<?php
$get = Yii::$app->request->get();
?>
<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <form action="<?=\yii\helpers\Url::to('/tours/index/')?>" method="get">
        <div class="filter-block__categories">
            <select class="selectpicker common-button common-button--thin" name="category">
                <?php foreach($categories as $category): ?>
                    <option value="<?=$category->id?>" <?=@$get['category'] == $category->id ? 'selected="selected"':''?>><?=$category->title_ru?></option>
                <?php endforeach; ?>
            </select>
            <select class="selectpicker common-button common-button--thin" name="city">
                <?php foreach($cities as $city): ?>
                    <option value="<?=$city->id?>" <?=@$get['city'] == $city->id ? 'selected="selected"':''?>><?=$city->title_ru?></option>
                <?php endforeach; ?>
            </select>
        </div>  <!--filter-block__categories-->
        <div class="filter-block__categories">
            <div class="filter-block__categories__criteria">
                <p>Количество дней</p>
                <label>От<input type="text" name="days_min" placeholder="" value="<?=@$get['days_min']?>"></label>
                <label>До<input type="text" name="days_max" placeholder="" value="<?=@$get['days_max']?>"></label>
            </div>
            <div class="filter-block__categories__criteria">
                <p>Количество человек</p>
                <label>От<input type="text" name="people_min" placeholder="" value="<?=@$get['people_min']?>"></label>
                <label>До<input type="text" name="people_max" placeholder="" value="<?=@$get['people_max']?>"></label>
            </div>

            <div class="filter-btn-group filter-btn-group--criteriafor">
                <a href="<?=\yii\helpers\Url::to('/tours/')?>" id="clearToursFilter" type="button" class="filter-btn-group__clear btn common-button">Очистить</a>
                <button type="submit" class="filter-btn-group__show btn common-button">Показать</button>
            </div>
        </div>
    </form>
</aside>