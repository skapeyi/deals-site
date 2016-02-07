<?php

use yii\db\Schema;
use yii\db\Migration;

class m160206_104502_update_payments_table extends Migration
{
    public function up()
    {
        $this->addColumn('payment','deleted','boolean');
        $this->addColumn('payment','completed','boolean');
        $this->addColumn('payment','amount','integer');
        $this->addColumn('payment','phone','decimal(10,10)');
        $this->addColumn('payment','date_completed','integer');
        $this->addColumn('payment','yodime_id','string');
        $this->addColumn('payment','merchant_id','string');
        $this->addColumn('payment','status','string');
    }

    public function down()
    {
        echo "m160206_104502_update_payments_table cannot be reverted.\n";

        return false;
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
