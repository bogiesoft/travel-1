<div class="field" id="d<?=$data['dayId']?>e<?=$data['elementId']?>v<?=$data['variantId']?>f<?=$data['fieldId']?>">
    <h6>Поле <?=$data['fieldId']?></h6>
    <div class="form-group">
        <select name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][fields][<?=$data['fieldId']?>][type_id]" id="" class="form-control">
            <option value="">Тип поля</option>
            <?php $types = \common\models\FieldType::find()->all();
            foreach($types as $type){
                echo '<option value="'.$type->id.'">'.$type->name.'</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group">

        <textarea class="form-control" name="Tours[days][<?=$data['dayId']?>][schedule][<?=$data['elementId']?>][variants][<?=$data['variantId']?>][fields][<?=$data['fieldId']?>][value]" id="" rows="4"></textarea>
    </div>
</div>