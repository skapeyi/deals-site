<?php

use yii\db\Schema;
use yii\db\Migration;

class m150806_072206_create_site_config_table extends Migration
{
    //this will contain config keys for platforms like twitter, facebook and all those, incase we need add the
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%site_config}}',[
            'id' => Schema::TYPE_PK,
            'fb_consumer' => Schema::TYPE_STRING,
            'fb_secret' => Schema::TYPE_STRING,
            'twitter_consumer'=>Schema::TYPE_STRING,
            'twitter_secret' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ],$tableOptions);

    }

    public function down()
    {
        echo "m150806_072206_create_site_config_table cannot be reverted.\n";

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
