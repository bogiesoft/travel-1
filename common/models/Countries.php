<?php

namespace common\models;

use Yii;
use common\models\Events;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $title_ru
 * * @property string $icon
 * @property string $description_ru
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ru'], 'required'],
            [['description_ru', 'icon'], 'string'],
            [['title_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Заголовок',
            'description_ru' => 'Описание',
            'icon' => 'Иконка',
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getEvents($where = [], $limit = 3) {
        return $this->hasMany(Events::className(), ['country_id' => 'id'])->where($where)->orderBy('created_at')->limit($limit);
    }
}
