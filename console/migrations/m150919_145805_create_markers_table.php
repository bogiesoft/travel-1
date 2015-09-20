<?php

use yii\db\Migration;

class m150919_145805_create_markers_table extends Migration
{
    public function up()
    {
        $this->createTable('markers',[
            'id' => $this->primaryKey(),
            'country' => $this->integer(11),
            'city' => $this->integer(11),
            'content_ru' => $this->text(),
            'image' => $this->string(255),
            'latlng' => $this->string(255),
            'status' => $this->boolean()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('markers');

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
