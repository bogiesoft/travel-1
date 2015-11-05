<?php

use yii\db\Migration;

class m151103_182226_foreign_keys_add extends Migration
{
    public function up()
    {
        //$this->addForeignKey('hotels_fk', 'hotels', 'id', 'tour_to_hotel', 'hotel_id');
        $this->addForeignKey('tours_fk', 'tours', 'id', 'tour_to_hotel', 'tour_id');

        $this->addForeignKey('t2h_fkh', 'tour_to_hotel', 'hotel_id', 'hotels', 'id');
        $this->addForeignKey('t2h_fkt', 'tour_to_hotel', 'tour_id', 'tours', 'id');
    }

    public function down()
    {
        echo "m151103_182226_foreign_keys_add cannot be reverted.\n";

        return false;
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
