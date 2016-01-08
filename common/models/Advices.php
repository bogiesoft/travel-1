<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "advices".
 *
 * @property integer $id
 * @property string $main_title_ru
 * @property string $sub_title_ru
 * @property string $excerpt_ru
 * @property string $full_content_ru
 * @property integer $show
 * @property string $created_at
 * @property string $updated_at
 */
class Advices extends \yii\db\ActiveRecord
{
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
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['excerpt_ru', 'full_content_ru'], 'string'],
            [['show','order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['main_title_ru', 'sub_title_ru', 'button_title_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_title_ru' => 'Большой заголовок',
            'button_title_ru' => 'Надпись на кнопке',
            'sub_title_ru' => 'Маленький заголовок',
            'excerpt_ru' => 'Краткое описание',
            'full_content_ru' => 'Полное описание',
            'show' => 'Показывать на сайте?',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'order'=>'Порядок показа'
        ];
    }
}
