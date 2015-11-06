<?php

use yii\db\Migration;

class m151105_193645_schedule_fields extends Migration
{
    public function up()
    {
        $this->createTable('variant_field', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(11),
            'content' => $this->text()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('variant_field');

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
