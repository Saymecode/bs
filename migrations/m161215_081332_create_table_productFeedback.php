<?php

use yii\db\Migration;

class m161215_081332_create_table_productFeedback extends Migration
{
    public function safeUp()
    {
        $this->createTable('productFeedback', [
            'idProductFeedback' => $this->primaryKey(),
            'idUser' => $this->integer()->notNull(),
            'idProduct' => $this->integer()->notNull()->unsigned(),
            'text' => $this->text()->notNull(),
            'evaluation' =>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
        ]);

        $this->addForeignKey('productFeedback_user', 'productFeedback', 'idUser', 'user', 'id');
        $this->addForeignKey('productFeedback_product', 'productFeedback', 'idProduct', 'product', 'idProduct');
    }

    public function safeDown()
    {
        $this->dropTable('productFeedback');
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
