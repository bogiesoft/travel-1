<select name="<?=$data['name']?>" id="" multiple class="form-control">
    <?php
    $hidden = \yii\helpers\ArrayHelper::map(\common\models\FieldsToHide::find()->where([
        'object_id'=>$data['objectId'],
        'tour_id'=>$data['tourId']])
        ->all(), 'object_field_id', 'object_field_id');
    $object = \common\models\Hotels::findOne($data['objectId']);
    foreach($object->fields as $field): ?>
        <option value="<?=$field->id?>" <?=in_array($field->id, $hidden) ? 'selected="selected"' : ''?>><?=$field->type->name?></option>
    <?php endforeach; ?>
</select>