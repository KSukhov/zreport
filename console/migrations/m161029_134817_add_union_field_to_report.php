<?php

use yii\db\Migration;

class m161029_134817_add_union_field_to_report extends Migration
{
    public function up()
    {
        $this->addColumn('report','union_id','integer');
    }


    public function down()
    {
        $this->dropColumn('report','union_id');
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
