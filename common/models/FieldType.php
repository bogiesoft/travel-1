<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_type".
 *
 * @property integer $id
 * @property string $icon
 * @property string $name
 * @property string $default_value
 */
class FieldType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['default_value'], 'string'],
            [['icon', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Иконка',
            'name' => 'Название',
            'default_value' => 'Значение по умолчанию',
        ];
    }
}
