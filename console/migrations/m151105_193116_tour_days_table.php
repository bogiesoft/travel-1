<?php

use yii\db\Migration;

class m151105_193116_tour_days_table extends Migration
{
    public function up()
    {
        $this->createTable('tour_day', [
            'id' => $this->primaryKey(),
            'tour_id' => $this->integer(11)
        ]);
    }

    public function down()
    {
        $this->dropTable('tour_days');

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
