<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "object_codes".
 *
 * @property integer $id
 * @property integer $object_id
 * @property string $code
 * @property integer $tour_id
 * @property string $created_at
 */
class ObjectCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'tour_id', 'user_id', 'country_id', 'city_id', 'object_category_id'], 'integer'],
            [['created_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object_id' => 'Объект',
            'code' => 'Код',
            'tour_id' => 'Тур',
            'country_id' => 'Страна',
            'city_id' => 'Город',
            'object_category_id' => 'Категория',
            'created_at' => 'Создано',
            'user_id' => 'Пользователь',
            'city'=> 'Город',
            'country'=> 'Страна',
            'category'=> 'Категория',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getObject() {
        return $this->hasOne(Hotels::className(), ['id'=>'object_id']);
    }

    public function getTour() {
        return $this->hasOne(Tours::className(), ['id'=>'tour_id']);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

    public function getCountry() {
        return $this->hasOne(Countries::className(), ['id'=>'country_id']);
    }

    public function getCity() {
        return $this->hasOne(Cities::className(), ['id'=>'city_id']);
    }

    public function getCategory() {
        return $this->hasOne(ObjectCategory::className(), ['id'=>'object_category_id']);
    }
    public function getTourvariant() {
        return $this->hasOne(ScheduleVariant::className(), ['object_id'=>'object_id', 'tour_id'=>'tour_id']);
    }


}
