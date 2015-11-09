<h5>Вариант <?=$data['variantId']?></h5>
<div class="col-md-12 variant-wrp">

    <div class="row variant" id="d<?=$data['dayId']?>e<?=$data['elementId']?>v<?=$data['variantId']?>">
        <div class="form-inline">
            <div class="form-group">
                <input type="text" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][label]" class="form-control" placeholder="Лейбл" size="20">
            </div>
            <div class="form-group">
                <input type="file" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][icon]" id="" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][header]" class="form-control" placeholder="Заголовок" size="70">
            </div>
        </div>

        <div class="text-right"><a data-day-id="<?=$data['dayId']?>" data-element-id="<?=$data['elementId']?>" data-variant-id="<?=$data['variantId']?>" href="" class="add-field">Добавить поле</a></div>

        <div class="fields">

        </div>

    </div>
</div>