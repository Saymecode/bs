<?php

use yii\db\Migration;

class m161201_111430_table_feedback extends Migration
{
    public function safeUp()
    {
        $this->createTable('feedback', [
            'idFeedback' => $this->primaryKey(),
            'idUser' => $this->integer(),
            'name' => $this->string(40)->notNull(),
            'email' => $this->string(40)->notNull(),
            'title' => $this->string(40)->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('feedback_user', 'feedback', 'idUser', 'user', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('feedback');
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
