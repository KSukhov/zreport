<?php

use yii\db\Migration;

class m161029_090623_add_fields_to_report extends Migration
{
    public function up()
    {

        $this->addColumn('report','sended','integer');
        $this->addColumn('report','aprove','integer');
        $this->addColumn('report','notific','integer');
    }

    public function down()
    {
        $this->dropColumn('report','sended');
        $this->dropColumn('report','aprove');
        $this->dropColumn('report','notific');
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
