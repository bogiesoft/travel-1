<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m150922_191946_create_events_table extends Migration
{
    public function up()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'country_id' => $this->integer(11),
            'event_category_id' => $this->integer(11),
            'place_ru' => $this->string(255),
            'date' => $this->date(),
            'images' => $this->string(255),
            'content_ru' => $this->text(),
            'tickets_link' => $this->string(500),
            'status' => $this->boolean(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('events');

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
