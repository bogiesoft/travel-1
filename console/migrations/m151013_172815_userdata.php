<?php

use yii\db\Migration;

class m151013_172815_userdata extends Migration
{
    public function up()
    {
        $this->createTable('userdata', [
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer(11),
            'firstname'=>$this->string(255),
            'lastname'=>$this->string(255),
            'country'=>$this->string(255),
            'city'=>$this->string(255),
            'image'=>$this->string(255),
            'can_moderate'=>$this->boolean(),
            'status'=>$this->boolean(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime()
        ]);
    }

    public function down()
    {
        $this->dropTable('userdata');

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
