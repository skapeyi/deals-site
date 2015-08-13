<?php

use yii\db\Schema;
use yii\db\Migration;

class m150811_145319_add_promo_codes_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%promocode}}',[
            'id' => Schema::TYPE_PK,
            'code' => Schema::TYPE_STRING,
            'date_used' => Schema::TYPE_DATETIME,
            'user_id' => Schema::TYPE_INTEGER.'(11)',
            'order_id' => Schema::TYPE_INTEGER.'(11)',
            'discount' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ], $tableOptions);

        $this->addForeignKey('promocode_fk1','promocode','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('promodcod_fk2','promocode','order_id','order','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m150811_145319_add_promo_codes_table cannot be reverted.\n";

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
