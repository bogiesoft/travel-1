<?php

use yii\db\Migration;

class m150917_230222_create_options_table extends Migration
{
    public function up()
    {
        $this->createTable('options', [
           'id'=>$this->primaryKey(),
            'name'=>$this->string(255),
            'value'=>$this->string(255)
        ]);
    }

    public function down()
    {
        $this->dropTable('options');

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
