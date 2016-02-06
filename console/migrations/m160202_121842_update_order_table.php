<?php

use yii\db\Schema;
use yii\db\Migration;

class m160202_121842_update_order_table extends Migration
{
    public function up()
    {
        $this->addColumn('order','quantity','integer');
        $this->addColumn('order','unit','integer');
        $this->addColumn('order','method','string');
        $this->addColumn('order','payment_id','integer');

    }

    public function down()
    {
        echo "m160202_121842_update_order_table cannot be reverted.\n";

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
