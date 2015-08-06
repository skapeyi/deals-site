<?php

use yii\db\Schema;
use yii\db\Migration;

class m150806_065822_create_user_location_table extends Migration
{
    //we will enable devices' to send us locations for the user, so that we can customize and send them push notifications
    //when they are in a certain area or when deals in a place they go to have been added
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_location}}',[
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER.'(11)',
            'location_x' =>Schema::TYPE_DECIMAL.'(10,8)',
            'location_y' => Schema::TYPE_DECIMAL.'(10,8)',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ],$tableOptions);

        $this->addForeignKey('ul_fk1','user_location','user_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('ul_fk2','user_location','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('ul_fk3','user_location','updated_by','user','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m150806_065822_create_user_location_table cannot be reverted.\n";

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
