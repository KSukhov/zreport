<?php

use yii\db\Migration;

class m161029_140304_add_union_field_to_union_report extends Migration
{
    public function up()
    {
        $this->addColumn('union_report','union_id','integer');

    }

    public function down()
    {
        $this->dropColumn('union_report','union_id');

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
