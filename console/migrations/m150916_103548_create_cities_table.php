<?php

use yii\db\Migration;

class m150916_103548_create_cities_table extends Migration
{
    public function up()
    {
        $this->createTable('cities',[
            "id" => $this->primaryKey(),
            "title_ru" => "varchar(255) NOT NULL",
            "description_ru" => "mediumtext NOT NULL",
            "country_id" => "int(11) NOT NULL"
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('cities');
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
