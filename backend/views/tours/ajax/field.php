<div class="field" id="f<?=$data['fieldId']?>">
    <h6>Поле <?=$data['fieldId']?></h6>
    <div class="form-group">
        <select name="Hotel[fields][<?=$data['fieldId']?>][type_id]" id="" class="field-type-select form-control">
            <option value="">Тип поля</option>
            <?php $types = \common\models\FieldType::find()->all();
            foreach($types as $type){
                echo '<option value="'.$type->id.'">'.$type->name.'</option>';
            }
            ?>
        </select>
    </div>
    <div class="form-group field-inp-wrp">
        <input type="hidden" name="<?='Hotel[fields]['.$data['fieldId'].'][value]'?>">
    </div>
</div>