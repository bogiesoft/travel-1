<?php

namespace common\models;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "hotels".
 *
 * @property integer $id
 * @property string $title_ru
 * @property string $description_ru
 * @property string $place_ru
 * @property string $way_ru
 * @property integer $discount
 * @property string $link
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_ru', 'place_ru', 'way_ru'], 'string'],
            [['discount', 'brone', 'country_id', 'city_id'], 'integer'],
            [['categories'], 'safe'],
            [['title_ru', 'link'], 'string', 'max' => 255],
            //[['id'], 'exist', 'skipOnError' => true, 'targetClass' => TourToHotel::className(), 'targetAttribute' => ['id' => 'hotel_id']],
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
            'description_ru' => 'Описание',
            'place_ru' => 'Адрес',
            'way_ru' => 'Как доехать',
            'discount' => 'Скидка для участников (число)',
            'link' => 'Ссылка',
            'country_id' => 'Страна',
            'city_id' => 'Город',
            'brone' => 'Объязательно бронирование?',
        ];
    }

    public function getTours()
    {
        return $this->hasMany(Tours::className(), ['id'=>'tour_id'])
            ->viaTable('tour_to_hotel', ['hotel_id'=>'id']);
    }

    public function getCategories() {
        return $this->hasMany(ObjectCategory::className(), ['id'=>'category_id'])
            ->viaTable('object_to_category', ['object_id'=>'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'categories' => 'categories',
                ],
            ]
        ];
    }

    public function getFields() {
        return $this->hasMany(ObjectField::className(), ['object_id'=>'id']);
    }

    public function getCountry() {
        return $this->hasOne(Countries::className(), ['country_id'=>'id']);
    }

    public function getCity() {
        return $this->hasOne(Cities::className(), ['id'=>'city_id']);
    }
}
