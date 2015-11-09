<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "variant_field".
 *
 * @property integer $id
 * @property integer $variant_id
 * @property integer $type_id
 * @property string $content
 */
class VariantField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variant_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['variant_id', 'type_id'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'variant_id' => 'Variant ID',
            'type_id' => 'Type ID',
            'content' => 'Content',
        ];
    }

    public function getType(){
        return $this->hasOne(FieldType::className(), ['id'=>'type_id']);
    }
}
