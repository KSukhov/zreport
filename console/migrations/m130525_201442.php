<?php

use yii\db\Migration;

class m130525_201442_init extends Migration
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
