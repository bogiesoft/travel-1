<?php

use yii\db\Migration;

class m151103_111803_tours_categories_table extends Migration
{
    public function up()
    {
        $this->createTable('tour_category', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(255),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'status' => $this->boolean()
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('tour_category');

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
