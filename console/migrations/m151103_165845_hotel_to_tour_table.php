<?php

use yii\db\Migration;

class m151103_165845_hotel_to_tour_table extends Migration
{
    public function up()
    {
        $this->createTable('tour_to_hotel', [
            'hotel_id' => $this->integer(11),
            'tour_id' => $this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('tour_to_hotel');

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
