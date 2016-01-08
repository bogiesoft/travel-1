<?php

use yii\db\Migration;

class m151112_211545_faq_table extends Migration
{
    public function up()
    {
        $this->createTable('faq', [
            'id'=>$this->primaryKey(),
            'title_ru'=>$this->text(),
            'content_ru'=>$this->text(),
            'order'=>$this->integer(11)
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('faq');

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
