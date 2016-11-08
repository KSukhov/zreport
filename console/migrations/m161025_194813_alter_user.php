<?php

use yii\db\Migration;

class m161025_194813_alter_user extends Migration
{

    public function up()
    {


        $this->addColumn('user','department_id','integer');
        $this->addColumn('user','report','integer');

    }

    public function down()
    {
        $this->dropColumn('user','department_id');
        $this->dropColumn('user','report');
    }

}
