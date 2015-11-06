<?php

use yii\db\Migration;

class m151105_194444_field_types extends Migration
{
    public function up()
    {
        $this->createTable('field_type', [
            'id' => $this->primaryKey(),
            'icon' => $this->string(255),
            'name' => $this->string(255),
            'default_value' => $this->text()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('field_type');

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
