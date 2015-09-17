<?php

use yii\db\Migration;

class m150917_114825_create_advert_table extends Migration
{
    public function up()
    {
        $this->createTable('adv',[
            'id' => $this->primaryKey(),
            'link' => $this->string(255),
            'image' => $this->string(255),
            'show' => $this->boolean(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('adv');

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
