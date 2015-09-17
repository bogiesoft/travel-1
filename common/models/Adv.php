<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adv".
 *
 * @property integer $id
 * @property string $link
 * @property string $image
 * @property integer $show
 */
class Adv extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adv';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show'], 'integer'],
            [['link', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'image' => 'Image',
            'show' => 'Show',
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
}
