<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property string $model
 * @property integer $item_id
 * @property integer $user_id
 * @property string $title_ru
 * @property string $content_ru
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'user_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['content_ru'], 'string'],
            [['model', 'title_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'item_id' => 'Item ID',
            'user_id' => 'User ID',
            'title_ru' => 'Title Ru',
            'content_ru' => 'Content Ru',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
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
            ]
        ];
    }

    public function getUser() {
        return $this->hasOne(Userdata::className(), ['user_id'=>'user_id']);
    }
}
