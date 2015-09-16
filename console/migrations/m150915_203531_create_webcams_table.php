<?php

use yii\db\Migration;

class m150915_203531_create_webcams_table extends Migration
{
    public function up()
    {
        $this->createTable('webcams', [
            "id" => $this->primaryKey(),
            "title_ru" => "varchar(255) NOT NULL",
            "image" => "varchar(255) NOT NULL",
            "code" => "longtext NOT NULL",
            "city_ru" => "varchar(255) NOT NULL",
            "country_ru" => "varchar(255) NOT NULL",
            "description_ru" => "mediumtext NOT NULL",
            "timezone" => "varchar(255) NOT NULL",
            "size_width" => "int(11) NOT NULL",
            "size_height" => "int(11) NOT NULL",
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('webcams');
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
