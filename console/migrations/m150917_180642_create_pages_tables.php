<?php

use yii\db\Migration;

class m150917_180642_create_pages_tables extends Migration
{
    public function up()
    {
        $this->createTable('pages',[
            'id'=>$this->primaryKey(),
            'title_ru'=>$this->string(255),
            'slug'=>$this->string(255),
            'content_ru'=>$this->text(),
            'status'=>$this->boolean(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('pages');

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
