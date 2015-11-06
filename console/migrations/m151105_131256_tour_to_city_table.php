<?php

use yii\db\Migration;

class m151105_131256_tour_to_city_table extends Migration
{
    public function up()
    {
        $this->createTable('tour_to_city', [
            'id'=>$this->primaryKey(),
            'tour_id'=>$this->integer(11),
            'city_id'=>$this->integer(11),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('tour_to_city');

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
