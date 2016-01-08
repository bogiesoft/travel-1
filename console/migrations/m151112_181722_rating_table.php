<?php

use yii\db\Migration;

class m151112_181722_rating_table extends Migration
{
    public function up()
    {
        $this->createTable('rating', [
            'id'=>$this->primaryKey(),
            'event_id'=>$this->integer(11),
            'user_id'=>$this->integer(11),
            'rating'=>$this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('rating');

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
