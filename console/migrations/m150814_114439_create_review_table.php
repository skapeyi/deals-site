<?php

use yii\db\Schema;
use yii\db\Migration;

class m150814_114439_create_review_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%review}}',[
            'id' => Schema::TYPE_PK,
            'merchant_id' => Schema::TYPE_INTEGER.'(11)',
            'comment' => Schema::TYPE_TEXT,
            'rating' => Schema::TYPE_SMALLINT,
            'status' => Schema::TYPE_SMALLINT,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',

        ],$tableOptions);

        $this->addForeignKey('review_fk1','review','merchant_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('review_fk2','review','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('review_fk3','review','updated_by','user','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m150814_114439_create_review_table cannot be reverted.\n";

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
