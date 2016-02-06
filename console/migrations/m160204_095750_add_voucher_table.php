<?php

use yii\db\Schema;
use yii\db\Migration;

class m160204_095750_add_voucher_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%voucher}}',[
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'deal_id' => $this->integer(),
            'redeemed' => $this->boolean(),
            'redeemed_date' => $this->integer(),
            'payment_method' => $this->string(),
            'payment_id' => $this->integer(),
            'deleted' => $this->boolean(),
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',

        ],$tableOptions);

        $this->addForeignKey('voucher_fk1','voucher','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('voucher_fk2','voucher','updated_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('voucher_fk3','voucher','deal_id','deal','id','CASCADE','CASCADE');
        $this->addForeignKey('voucher_fk4','voucher','payment_id','payment','id','CASCADE','CASCADE');





    }


    public function down()
    {
        echo "m160204_095750_add_voucher_table cannot be reverted.\n";

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
