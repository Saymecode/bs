<?php

use yii\db\Migration;

class m161201_092604_create_table_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'idPost' => $this->primaryKey(),
            'name' => $this->string(40)->notNull(),
            'img' => $this->string(255)->notNull(),
            'quote' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
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
