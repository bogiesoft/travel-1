<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "forum_posts".
 *
 * @property integer $post_id
 * @property integer $topic_id
 * @property integer $forum_id
 * @property integer $poster_id
 * @property integer $icon_id
 * @property string $poster_ip
 * @property integer $post_time
 * @property integer $post_reported
 * @property integer $enable_bbcode
 * @property integer $enable_smilies
 * @property integer $enable_magic_url
 * @property integer $enable_sig
 * @property string $post_username
 * @property string $post_subject
 * @property string $post_text
 * @property string $post_checksum
 * @property integer $post_attachment
 * @property string $bbcode_bitfield
 * @property string $bbcode_uid
 * @property integer $post_postcount
 * @property integer $post_edit_time
 * @property string $post_edit_reason
 * @property integer $post_edit_user
 * @property integer $post_edit_count
 * @property integer $post_edit_locked
 * @property integer $post_visibility
 * @property integer $post_delete_time
 * @property string $post_delete_reason
 * @property integer $post_delete_user
 */
class ForumPosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forum_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'forum_id', 'poster_id', 'icon_id', 'post_time', 'post_reported', 'enable_bbcode', 'enable_smilies', 'enable_magic_url', 'enable_sig', 'post_attachment', 'post_postcount', 'post_edit_time', 'post_edit_user', 'post_edit_count', 'post_edit_locked', 'post_visibility', 'post_delete_time', 'post_delete_user'], 'integer'],
            [['post_text'], 'required'],
            [['post_text'], 'string'],
            [['poster_ip'], 'string', 'max' => 40],
            [['post_username', 'post_subject', 'bbcode_bitfield', 'post_edit_reason', 'post_delete_reason'], 'string', 'max' => 255],
            [['post_checksum'], 'string', 'max' => 32],
            [['bbcode_uid'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'topic_id' => 'Topic ID',
            'forum_id' => 'Forum ID',
            'poster_id' => 'Poster ID',
            'icon_id' => 'Icon ID',
            'poster_ip' => 'Poster Ip',
            'post_time' => 'Post Time',
            'post_reported' => 'Post Reported',
            'enable_bbcode' => 'Enable Bbcode',
            'enable_smilies' => 'Enable Smilies',
            'enable_magic_url' => 'Enable Magic Url',
            'enable_sig' => 'Enable Sig',
            'post_username' => 'Post Username',
            'post_subject' => 'Post Subject',
            'post_text' => 'Post Text',
            'post_checksum' => 'Post Checksum',
            'post_attachment' => 'Post Attachment',
            'bbcode_bitfield' => 'Bbcode Bitfield',
            'bbcode_uid' => 'Bbcode Uid',
            'post_postcount' => 'Post Postcount',
            'post_edit_time' => 'Post Edit Time',
            'post_edit_reason' => 'Post Edit Reason',
            'post_edit_user' => 'Post Edit User',
            'post_edit_count' => 'Post Edit Count',
            'post_edit_locked' => 'Post Edit Locked',
            'post_visibility' => 'Post Visibility',
            'post_delete_time' => 'Post Delete Time',
            'post_delete_reason' => 'Post Delete Reason',
            'post_delete_user' => 'Post Delete User',
        ];
    }

    public function getTopic() {
        return $this->hasOne(ForumTopics::className(), ['topic_id'=>'topic_id']);
    }
}
