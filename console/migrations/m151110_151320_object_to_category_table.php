<?php

use yii\db\Migration;

class m151110_151320_object_to_category_table extends Migration
{
    public function up()
    {
        $this->createTable('object_to_category', [
            'id'=>$this->primaryKey(),
            'category_id' => $this->integer(11),
            'object_id' => $this->integer(11),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('object_to_category');

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
