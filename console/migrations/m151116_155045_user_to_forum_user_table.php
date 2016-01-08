<?php

use yii\db\Migration;

class m151116_155045_user_to_forum_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user_to_forum_user', [
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer(11),
            'forum_user_id'=>$this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('user_to_forum_user');

        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
