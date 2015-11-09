<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_day".
 *
 * @property integer $id
 * @property integer $tour_id
 */
class TourDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_id' => 'Tour ID',
        ];
    }

    public function getSchedule() {
        return $this->hasMany(DaySchedule::className(), ['day_id'=>'id']);
    }
}
