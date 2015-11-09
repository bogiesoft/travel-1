<?php

namespace common\models;

use Yii;

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
            [['discount'], 'integer'],
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
        ];
    }

    public function getTour()
    {
        return $this->hasOne(TourToHotel::className(), ['hotel_id' => 'id']);
    }
}