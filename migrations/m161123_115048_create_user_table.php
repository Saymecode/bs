<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m161123_115048_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password_hash'=>$this->string()->notNull(),
            'status'=>$this->smallInteger()->notNull(),
            'auth_key'=>$this->string(32)->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
