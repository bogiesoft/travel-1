<?php

use yii\db\Migration;

class m151225_124409_menu_items extends Migration
{
    public function up()
    {
        $this->createTable('menu_items', [
            'id'=>$this->primaryKey(),
            'title'=>$this->string(255),
            'link'=>$this->string(255),
            'order'=>$this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('menu_items');

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
