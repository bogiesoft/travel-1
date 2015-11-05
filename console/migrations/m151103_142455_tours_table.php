<?php

use yii\db\Migration;

class m151103_142455_tours_table extends Migration
{
    public function up()
    {
        $this->createTable('tours', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'description_ru' => $this->text(),
            'support' => $this->text(),
            'image' => $this->string(255),
            'country_id' => $this->integer(11),
            'city_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'status' => $this->boolean(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('tours');

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
