<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "day_schedule".
 *
 * @property integer $id
 * @property integer $day_id
 */
class DaySchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'day_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day_id' => 'Day ID',
        ];
    }

    public function getVariants() {
        return $this->hasMany(ScheduleVariant::className(), ['item_id'=>'id']);
    }
}
