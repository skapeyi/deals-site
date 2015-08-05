<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_095027_create_merchant_config extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%merchant_config}}',[
            'id' => Schema::TYPE_PK,
            'merchant_id' => Schema::TYPE_INTEGER.'(11) NOT NULL',
            'twitter_url' => Schema::TYPE_STRING,
            'facebook_url' => Schema::TYPE_STRING,
            'instagram_url' => Schema::TYPE_STRING,
            'menu_url' => Schema::TYPE_STRING,
            'g_plus_url' => Schema::TYPE_STRING,
            'location_x' => Schema::TYPE_DECIMAL.'(10,8)',
            'location_y' => Schema::TYPE_DECIMAL.'(10,8)',
            'profile' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ]);

        $this->addForeignKey('merchant_config_fk1','merchant_config','merchant_id', 'user', 'id','CASCADE','CASCADE');
        $this->addForeignKey('merchant_config_fk2','merchant_config','created_by','user','id', 'CASCADE','CASCADE');
        $this->addForeignKey('merchant_config_fk3','merchant_config','updated_by','user','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m150805_095027_create_merchant_config cannot be reverted.\n";

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
