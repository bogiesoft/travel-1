 <select name="object_id" class="form-control rs-select common-button common-button--thin">
        <?php foreach($hotels as $object): ?>
            <option data-city-id="<?=$object->city_id?>" data-country-id="<?=$object->country_id?>" value="<?=$object->id?>"><?=$object->title_ru?></option>
        <?php endforeach; ?>
    </select>