<?php

use yii\db\Migration;

class m161031_075222_add_notes extends Migration
{
    public function up()
    {
        $this->addColumn('report','liked','text');
        $this->addColumn('report','unlikde','text');
        $this->addColumn('report','offer','text');
    }

    public function down()
    {
        $this->dropColumn('report','liked');
        $this->dropColumn('report','unlikde');
        $this->dropColumn('report','offer');
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
