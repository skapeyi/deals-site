<?php

use yii\db\Schema;
use yii\db\Migration;

class m151106_152720_add_location_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //deals should have locations, such that we can filter them according to locations
        $this->createTable('{{%location}}',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',

        ], $tableOptions);
        //add foreign keys to the location table
        $this->addForeignKey('location_fk1','location','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('location_fk2','location','updated_by','user','id','CASCADE','CASCADE');

        // add location to the deal
        $this->addColumn('deal', 'location_id', Schema::TYPE_INTEGER.'(11)');

        //add foreign key to the deal table
        $this->addForeignKey('deal_fk_location','deal','location_id','location','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m151106_152720_add_location_table cannot be reverted.\n";

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
