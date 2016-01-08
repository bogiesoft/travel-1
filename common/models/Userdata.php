<?php

namespace common\models;

use common\models\User;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "userdata".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 *  @property string $country
 * @property string $city
 * @property string $image
 * * @property string $fathername
 * @property string $birthday
 * @property string $phone
 * @property string $skype
 * @property integer $can_moderate
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Userdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userdata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['fathername', 'birthday', 'phone', 'skype'], 'required'],*/
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['firstname', 'lastname', 'country', 'city', 'image', 'fathername', 'phone', 'skype'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'country' => 'Страна',
            'city' => 'Город',
            'image' => 'Фото',
            'fathername' => 'Отчество',
            'birthday' => 'Дата рождения',
            'phone' => 'Телефон',
            'skype' => 'Ник в Skype',
            'can_moderate' => 'Can Moderate',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
            ]
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
