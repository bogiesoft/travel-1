<?php

namespace common\models;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "tours".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $description_ru
 * @property string $support
 * @property string $image
 * @property integer $country_id
 * @property integer $city_id
 * @property integer $user_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Tours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_ru', 'support'], 'string'],
            [['country_id', 'city_id', 'user_id', 'status'], 'integer'],
            [['created_at', 'updated_at', 'hotels'], 'safe'],
            [['title_ru', 'image'], 'string', 'max' => 255],
            //[['id'], 'exist', 'skipOnError' => true, 'targetClass' => TourToHotel::className(), 'targetAttribute' => ['id' => 'tour_id']],
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
            'support' => 'Support',
            'image' => 'Image',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'user_id' => 'User ID',
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
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'hotels' => 'hotels',
                ],
            ],
        ];
    }

    public function getHotels()
    {
        return $this->hasMany(Hotels::className(), ['id'=>'hotel_id'])
            ->viaTable('tour_to_hotel', ['tour_id'=>'id']);
    }

    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id'=>'city_id']);
    }
}
