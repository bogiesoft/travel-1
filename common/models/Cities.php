<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $description_ru
 * @property integer $country_id
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'description_ru', 'country_id'], 'required'],
            [['description_ru'], 'string'],
            [['country_id'], 'integer'],
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
            'country_id' => 'Country ID',
        ];
    }
}
