<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "object_to_category".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $object_id
 */
class ObjectToCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_to_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'object_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'object_id' => 'Object ID',
        ];
    }
}
