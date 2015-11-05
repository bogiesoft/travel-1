<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_to_hotel".
 *
 * @property integer $hotel_id
 * @property integer $tour_id
 */
class TourToHotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_to_hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_id', 'event_id'], 'integer'],
            [['hotel_id', 'tour_id'], 'required'],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tours::className(), 'targetAttribute' => ['tour_id' => 'id']],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotels::className(), 'targetAttribute' => ['hotel_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hotel_id' => 'Hotel ID',
            'tour_id' => 'Tour ID',
        ];
    }
}
