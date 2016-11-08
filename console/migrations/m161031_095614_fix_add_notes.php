<?php

use yii\db\Migration;

class m161031_095614_fix_add_notes extends Migration
{
    public function up()
    {
        $this->dropColumn('report','unlikde');
        $this->addColumn('report','unliked','text');
    }

    public function down()
    {
        $this->addColumn('report','unlikde', 'text');
        $this->dropColumn('report','unliked');
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
