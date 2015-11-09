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
 * @property integer $city_id
 * @property integer $country_id
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
            [['title_ru', 'code', 'city_id', 'country_id', 'description_ru', 'timezone', 'size_width', 'size_height'], 'required'],
            [['code', 'description_ru'], 'string'],
            [['city_id', 'country_id', 'size_width', 'size_height'], 'integer'],
            [['title_ru', 'image', 'timezone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Название',
            'image' => 'Изображение',
            'code' => 'Код плеера',
            'city_id' => 'Город',
            'country_id' => 'Страна',
            'description_ru' => 'Описание',
            'timezone' => 'Временная зона',
            'size_width' => 'Ширина плеера',
            'size_height' => 'Высота плеера',
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
