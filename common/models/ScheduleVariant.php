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
            [['item_id'], 'integer'],
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
            'label' => 'Label',
            'icon' => 'Icon',
            'header' => 'Header',
        ];
    }

    public function getFields() {
        return $this->hasMany(VariantField::className(), ['variant_id'=>'id']);
    }
}
