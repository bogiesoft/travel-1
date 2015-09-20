<?php

use yii\db\Migration;

class m150920_215316_create_table_map_descriptions extends Migration
{
    public function up()
    {
        $this->createTable('map_descriptions', [

        ]);
    }

    public function down()
    {
        echo "m150920_215316_create_table_map_descriptions cannot be reverted.\n";

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
