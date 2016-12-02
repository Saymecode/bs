<?php

use yii\db\Migration;

class m161127_192052_table_cart extends Migration
{
    public function up()
    {
        $this->createTable('cart', [
                'idCart' => $this->primaryKey(),
                'idUser' => $this->integer()->notNull(),
                'idProduct' => $this->integer()->notNull()->unsigned(),
                'isBought' => $this->boolean(),
            ]
        );
        $this->addForeignKey('cart_user', 'cart', 'idUser', 'user', 'id');
        $this->addForeignKey('cart_product', 'cart', 'idProduct', 'product', 'idProduct');
    }

    public function down()
    {
        $this->dropTable('cart');
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
