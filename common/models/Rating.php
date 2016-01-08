<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $event_id
 * @property integer $user_id
 * @property integer $rating
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'user_id', 'rating'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'user_id' => 'User ID',
            'rating' => 'Rating',
        ];
    }
}
