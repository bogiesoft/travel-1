<?php

use yii\db\Migration;

class m151013_165932_reviews extends Migration
{
    public function up()
    {
        $this->createTable('reviews', [
            'id' => $this->primaryKey(),
            'model' => $this->string(255),
            'item_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'title_ru' => $this->string(255),
            'content_ru' => $this->text(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'status' => $this->boolean(),
        ]);
    }

    public function down()
    {
        $this->dropTable('reviews');

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
