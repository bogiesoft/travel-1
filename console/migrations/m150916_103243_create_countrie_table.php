<?php

use yii\db\Migration;

class m150916_103243_create_countrie_table extends Migration
{
    public function up()
    {
        $this->createTable('countries',[
            "id" => $this->primaryKey(),
            "title_ru" => "varchar(255) NOT NULL",
            "description_ru" => "mediumtext NOT NULL",
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('countries');
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
