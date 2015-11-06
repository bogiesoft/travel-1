<?php

use yii\db\Migration;

class m151105_193603_days_shcedule extends Migration
{
    public function up()
    {
        $this->createTable('day_schedule', [
            'id' => $this->primaryKey(),
            'day_id' => $this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('days_schedule');

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
