<?php

use yii\db\Migration;

class m151105_121206_tour_to_category_table extends Migration
{
    public function up()
    {
        $this->createTable('tour_to_category', [
            'id' => $this->primaryKey(),
            'tour_id'=>$this->integer(11),
            'category_id'=>$this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('tour_to_category');

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
