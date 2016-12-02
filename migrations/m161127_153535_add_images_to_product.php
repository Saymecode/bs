<?php

use yii\db\Migration;

class m161127_153535_add_images_to_product extends Migration
{
    public function up()
    {
        $this->addColumn('product', 'images', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('product', 'images');
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
