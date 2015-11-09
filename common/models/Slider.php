<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $image
 * @property string $link
 * @property string $link_name_ru
 * @property string $excerpt_ru
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['excerpt_ru'], 'string'],
            [['title_ru', 'image', 'link', 'link_name_ru'], 'string', 'max' => 255],
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
            'link' => 'Ссылка',
            'link_name_ru' => 'Надпись на ссылке',
            'excerpt_ru' => 'Краткое описание',
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
