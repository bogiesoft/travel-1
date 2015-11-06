<?php

use yii\db\Migration;

class m151105_193617_schedule_variants extends Migration
{
    public function up()
    {
        $this->createTable('schedule_variant', [
            'id' => $this->primaryKey(),
            'label' => $this->string(255),
            'icon' => $this->string(255),
            'header' => $this->string(255),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('schedule_variant');

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
