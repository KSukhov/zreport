<?php

use yii\db\Migration;

class m161104_153947_real_name_for_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'real_name', 'text');
    }

    public function down()
    {
        $this->dropColumn('user', 'real_name');

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
