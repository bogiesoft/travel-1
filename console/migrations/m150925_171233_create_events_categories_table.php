<?php

use yii\db\Migration;

class m150925_171233_create_events_categories_table extends Migration
{
    public function up()
    {
        $this->createTable('event_category', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'status' => $this->boolean(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('event_category');

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
