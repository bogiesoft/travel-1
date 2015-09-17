<?php

use yii\db\Migration;

class m150917_090105_create_slider_table extends Migration
{
    public function up()
    {
        $this->createTable('slider',[
            'id' => $this->primaryKey(),
            'title_ru'=> $this->string(255),
            'image' => $this->string(255),
            'link' => $this->string(255),
            'link_name_ru' => $this->string(255),
            'excerpt_ru' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('slider');

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
