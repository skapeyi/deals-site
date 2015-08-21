<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_153245_create_voucher_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%voucher}}',[
            'id' => Schema::TYPE_PK,
            'code' => Schema::TYPE_STRING.'(32)',
            'deal_id' => Schema::TYPE_INTEGER.'(11)',
            'user_id' => Schema::TYPE_INTEGER.'(11)',
            'type' => Schema::TYPE_BOOLEAN.' DEFAULT 0',//diff between admin generated vouchers(for events) and the rest
            'redeem_status' => Schema::TYPE_BOOLEAN.' DEFAULT 0',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',

        ],$tableOptions);

    }

    public function down()
    {
        echo "m150805_153245_create_voucher_table cannot be reverted.\n";

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
