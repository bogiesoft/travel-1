<?php

use yii\db\Migration;

class m150917_123242_create_news_table extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id'=>$this->primaryKey(),
            'title_ru'=>$this->string(255),
            'image'=>$this->string(255),
            'excerpt_ru'=>$this->text(),
            'content_ru'=>$this->text(),
            'status'=>$this->boolean(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime(),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');

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
