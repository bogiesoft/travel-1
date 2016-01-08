<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "object_field".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $type_id
 * @property string $content
 */
class ObjectField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'type_id'], 'integer'],
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
            'object_id' => 'Object ID',
            'type_id' => 'Type ID',
            'content' => 'Content',
        ];
    }

    public function getType(){
        return $this->hasOne(FieldType::className(), ['id'=>'type_id']);
    }
}
