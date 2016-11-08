<?php

use yii\db\Migration;

class m161030_123407_alter_timer_to_float extends Migration
{
    public function up()
    {
       $this->alterColumn('report_item', 'timer', 'float');
    }

    public function down()
    {
        $this->alterColumn('report_item', 'timer', 'integer');
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
