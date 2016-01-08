<?php

use yii\db\Migration;

class m151117_113625_object_fields extends Migration
{
    public function up()
    {
        $this->createTable('object_field', [
            'id' => $this->primaryKey(),
            'object_id' => $this->integer(11),
            'type_id' => $this->integer(11),
            'content' => $this->text()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('object_field');

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
