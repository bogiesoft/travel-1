<aside class="aside-block col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="filter-block__categories">
        <select class="selectpicker common-button common-button--thin">
            <?php foreach($categories as $category): ?>
            <option><?=$category->title_ru?></option>
            <?php endforeach; ?>
        </select>
        <select class="selectpicker common-button common-button--thin">
            <?php foreach($cities as $city): ?>
            <option><?=$city->title_ru?></option>
            <?php endforeach; ?>
        </select>
    </div>  <!--filter-block__categories-->
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
        <div class="filter-btn-group filter-btn-group--criteriafor">
            <button type="button" class="filter-btn-group__clear btn common-button">Очистить</button>
            <button type="button" class="filter-btn-group__show btn common-button">Показать</button>
        </div>
    </div>
</aside>