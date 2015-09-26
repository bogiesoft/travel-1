<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $title_ru
 * @property integer $country_id
 * @property string $place_ru
 * @property string $date
 * @property string $images
 * @property string $content_ru
 * @property string $tickets_link
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'event_category_id', 'status'], 'integer'],
            [['date'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['content_ru'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['title_ru', 'place_ru'], 'string', 'max' => 255],
            [['tickets_link'], 'string', 'max' => 500],
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
            'country_id' => 'Country ID',
            'place_ru' => 'Place Ru',
            'date' => 'Date',
            'images' => 'Images',
            'content_ru' => 'Content Ru',
            'tickets_link' => 'Tickets Link',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getCountry() {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }
}
