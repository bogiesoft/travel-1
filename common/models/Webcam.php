<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "webcams".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $image
 * @property string $code
 * @property string $city_ru
 * @property string $country_ru
 * @property string $description_ru
 * @property string $timezone
 * @property integer $size_width
 * @property integer $size_height
 */
class Webcam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'webcams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru', 'code', 'city_ru', 'country_ru', 'description_ru', 'timezone', 'size_width', 'size_height'], 'required'],
            [['code', 'description_ru', 'image'], 'string'],
            [['size_width', 'size_height'], 'integer'],
            [['title_ru', 'image', 'city_ru', 'country_ru', 'timezone'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'code' => 'Code',
            'city_ru' => 'City Ru',
            'country_ru' => 'Country Ru',
            'description_ru' => 'Description Ru',
            'timezone' => 'Timezone',
            'size_width' => 'Size Width',
            'size_height' => 'Size Height',
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
}
