<?php

use yii\db\Schema;
use yii\db\Migration;

class m160206_091350_add_activation_status_to_vouchers extends Migration
{
    public function up()
    {
        $this->addColumn('voucher','activation_status','bool');

        ///we need to update the payment table
        $this->dropColumn('payment','merchant_transaction_id');
        $this->dropColumn('payment','yodime_transaction_id');
        $this->dropColumn('payment','status');
        $this->dropColumn('payment','amount');
        $this->dropColumn('payment','amount_received');
        $this->dropColumn('payment','received_status');
        $this->dropColumn('payment','phone');

        $this->addColumn('payment','created_by','integer');
        $this->addColumn('payment','updated_by','integer');


    }

    public function down()
    {
        echo "m160206_091350_add_activation_status_to_vouchers cannot be reverted.\n";

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
