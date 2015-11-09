<button id="tour-filter-toggle-button" class="btn common-button collapsed visible-xs" data-target="#tour-filter-toggle" data-toggle="collapse" type="button">Фильтр по турам</button>

<div id="tour-filter-toggle" class="header-main__catalog-filter collapse">
    <div class="header-main__filter visible-sm visible-xs clearfix">
        <button class="btn common-button pull-left collapsed" data-target="#tour-variant-toggle" data-toggle="collapse" type="button">Вариант тура</button>
        <button class="btn common-button pull-right collapsed" data-target="#country-toggle" data-toggle="collapse" type="button">Город</button>
    </div>

    <div id="tour-variant-toggle" class="header-main__filter__variants collapse">
        <ul class="header-main__filter__list list-unstyled">
            <?php foreach($categories as $category): ?>
                <li class="col-sm-6 col-xs-6"><a href="#"><?=$category->title_ru?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="country-toggle" class="header-main__filter__variants collapse">
        <ul class="header-main__filter__list list-unstyled">
            <?php foreach($cities as $city): ?>
                <li class="col-sm-6 col-xs-6"><a href="#"><?=$city->title_ru?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="filter-block__categories">
        <div class="filter-block__categories__criteria">
            <p>Количество дней</p>
            <label>От<input type="text" name="" placeholder=""></label>
            <label>До<input type="text" name="" placeholder=""></label>
        </div>
        <div class="filter-block__categories__criteria">
            <p>Количество человек</p>
            <label>От<input type="text" name="" placeholder=""></label>
            <label>До<input type="text" name="" placeholder=""></label>
        </div>
        <div class="filter-block__categories__criteria">
            <p>Продолжительность</p>
            <label>От<input type="text" name="" placeholder=""></label>
            <label>До<input type="text" name="" placeholder=""></label>
        </div>
    </div>
    <div class="filter-btn-group filter-btn-group--criteriafor">
        <button type="button" class="filter-btn-group__clear btn common-button">Очистить</button>
        <button type="button" class="filter-btn-group__show btn common-button">Показать</button>
    </div>
</div>  <!--header-main__catalog-filter-->