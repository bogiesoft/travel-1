<?php

namespace common\models;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Json;

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
 *  @property string $incost
 * @property string $outcost
 * @property string $maybecost
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
            [['description_ru', 'support', 'incost', 'outcost', 'maybecost'], 'string'],
            [['country_id', 'city_id', 'user_id', 'status'], 'integer'],
            [['created_at', 'updated_at', 'hotels', 'categories', 'cities'], 'safe'],
            [['title_ru'], 'string', 'max' => 255],
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
            'title_ru' => 'Название',
            'description_ru' => 'Контент',
            'incost' => 'В стоимость включено',
            'outcost' => 'Обьязательно оплачивается',
            'maybecost' => 'Оплачивается по желанию',
            'support' => 'При поддержке',
            'image' => 'Изображения',
            'country_id' => 'Страна',
            'city_id' => 'Город',
            'user_id' => 'Пользователь',
            'status' => 'Показыать на сайте?',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
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
                    'categories' => 'categories',
                    'cities' => [
                        'cities',
                        'viaTableValues' => [
                            'created_at' => function($model, $relationName, $attributeName) {
                                return new Expression('NOW()');
                            },
                        ],
                    ],
                ],
            ]
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

    public function getUserdata()
    {
        return $this->hasOne(Userdata::className(), ['user_id'=>'user_id']);
    }

    public function getCategories() {
        return $this->hasMany(TourCategory::className(), ['id'=>'category_id'])
            ->viaTable('tour_to_category', ['tour_id'=>'id']);
    }

    public function getCities() {
        return $this->hasMany(Cities::className(), ['id'=>'city_id'])
            ->viaTable('tour_to_city', ['tour_id'=>'id']);
    }

    public function getCitiesCustom($id = 0) {
        $db = Yii::$app->db
            ->createCommand('SELECT cities.title_ru, cities.id
            FROM `tour_to_city`
            JOIN `cities` ON cities.id = tour_to_city.city_id
            WHERE tour_to_city.tour_id = '.$id.' ORDER BY tour_to_city.created_at DESC')
            ->queryAll();
        return $db;
    }

    public function getDays() {
        return $this->hasMany(TourDay::className(), ['tour_id'=>'id']);
    }
}
