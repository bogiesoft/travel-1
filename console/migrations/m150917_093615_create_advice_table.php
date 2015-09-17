<?php

use yii\db\Migration;

class m150917_093615_create_advice_table extends Migration
{
    public function up()
    {
        $this->createTable('advices', [
           'id'=>$this->primaryKey(),
            'main_title_ru'=>$this->string(255),
            'sub_title_ru'=>$this->string(255),
            'excerpt_ru'=>$this->text(),
            'full_content_ru'=>$this->text(),
            'show'=>$this->boolean(),
            'created_at'=>$this->dateTime()->notNull(),
            'updated_at'=>$this->dateTime()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('advices');

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
