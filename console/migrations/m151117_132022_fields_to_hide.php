<?php

use yii\db\Migration;

class m151117_132022_fields_to_hide extends Migration
{
    public function up()
    {
        $this->createTable('fields_to_hide', [
            'id'=>$this->primaryKey(),
            'object_id'=>$this->integer(11),
            'tour_id'=>$this->integer(11),
            'object_field_id'=>$this->integer(11),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('fields_to_hide');

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
