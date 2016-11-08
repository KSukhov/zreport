<?php

use yii\db\Migration;

class m161026_075412_fix_user extends Migration
{
    public function up()
    {
        $this->dropColumn('user','department_id');
        $this->addColumn('user','departament_id','integer');
    }

    public function down()
    {
        $this->dropColumn('user','departament_id');
        $this->addColumn('user','department_id','integer');
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
