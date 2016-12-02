<?php

use yii\db\Migration;

/**
 * Handles adding forename to table `user`.
 */
class m161124_163500_add_forename_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'forename', $this->string(255)->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'forename');
    }
}
