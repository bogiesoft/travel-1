<?php

use yii\db\Migration;

class m151110_145955_object_codes_table extends Migration
{
    public function up()
    {
        $this->createTable('object_codes', [
            'id'=>$this->primaryKey(),
            'object_id'=>$this->integer(11),
            'tour_id'=>$this->integer(11),
            'code'=>$this->string(255),
            'user_id'=>$this->integer(11),
            'created_at'=>$this->dateTime()->notNull(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('object_codes');

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
