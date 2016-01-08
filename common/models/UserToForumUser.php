<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_to_forum_user".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $forum_user_id
 */
class UserToForumUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_to_forum_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'forum_user_id'], 'integer'],
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
            'forum_user_id' => 'Forum User ID',
        ];
    }
}
