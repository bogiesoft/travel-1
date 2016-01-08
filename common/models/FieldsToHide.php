<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fields_to_hide".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $tour_id
 * @property integer $object_field_id
 */
class FieldsToHide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fields_to_hide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'tour_id', 'object_field_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object_id' => 'Object ID',
            'tour_id' => 'Tour ID',
            'object_field_id' => 'Object Field ID',
        ];
    }
}
