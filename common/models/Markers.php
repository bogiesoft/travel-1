<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "markers".
 *
 * @property integer $id
 * @property integer $country
 * @property integer $city
 * @property string $content_ru
 * @property string $image
 * @property string $latlng
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Markers extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'markers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'city', 'status'], 'integer'],
            [['content_ru'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['image', 'latlng'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Страна',
            'city' => 'Город',
            'content_ru' => 'Контент',
            'image' => 'Изображение',
            'latlng' => 'Положение маркера',
            'status' => 'Показывать на сайте?',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}
