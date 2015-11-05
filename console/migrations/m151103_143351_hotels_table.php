<?php

use yii\db\Migration;

class m151103_143351_hotels_table extends Migration
{
    public function up()
    {
        $this->createTable('hotels', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'description_ru' => $this->text(),
            'place_ru' => $this->text(),
            'way_ru' => $this->text(),
            'discount' => $this->integer(11),
            'link' => $this->string(255),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('hotels');

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
