<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule_variant".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $label
 * @property string $icon
 * @property string $header
 */
class ScheduleVariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule_variant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'object_id'], 'integer'],
            [['datetime'], 'safe'],
            [['label', 'icon', 'header'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'object_id' => 'Object',
            'label' => 'Label',
            'icon' => 'Icon',
            'header' => 'Header',
            'tour_id' => 'Tour ID',
        ];
    }

    public function getFields() {
        return $this->hasMany(VariantField::className(), ['variant_id'=>'id']);
    }

    public function getObject() {
        return $this->hasOne(Hotels::className(), ['id'=>'object_id']);
    }

    public function getHidden() {
        return $this->hasMany(FieldsToHide::className(), ['object_id', 'object_id'])
            ->viaTable('fields_to_hide', ['object_id'=>'object_id']);
    }

    public function getDay() {
        return $this->hasOne(DaySchedule::className(), ['tour_id'=>'tour_id']);
    }
}
