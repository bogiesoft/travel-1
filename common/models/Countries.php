<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $description_ru
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru'], 'required'],
            [['description_ru'], 'string'],
            [['title_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'description_ru' => 'Description Ru',
        ];
    }
}
