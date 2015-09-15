<?php

use yii\db\Schema;
use yii\db\Migration;

class m150911_070732_create_temp_payments_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{payment}}',[
            'id' => Schema::TYPE_PK, // same us the merchant_transaction_id
            'merchant_transaction_id' => Schema::TYPE_STRING,
            'yodime_transaction_id' => Schema::TYPE_INTEGER,
            'amount' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_STRING,
            'amount_received' => Schema::TYPE_STRING,
            'received_status' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',

        ],$tableOptions);


    }

    public function down()
    {
        echo "m150911_070732_create_temp_payments_table cannot be reverted.\n";

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
