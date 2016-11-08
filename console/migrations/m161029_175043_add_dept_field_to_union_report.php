<?php

use yii\db\Migration;

class m161029_175043_add_dept_field_to_union_report extends Migration
{
    public function up()
    {
        $this->addColumn('union','departament_id','integer');
    }

    public function down()
    {
        $this->dropColumn('union','union_id');
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
