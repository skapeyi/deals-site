<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_140946_create_deals_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%deal}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'start_date'=>Schema::TYPE_DATETIME.' NOT NULL',
            'end_date' => Schema::TYPE_DATETIME.' NOT NULL',
            'value' => Schema::TYPE_SMALLINT.' NOT NULL',
            'highlight' => Schema::TYPE_TEXT,
            'fine_print' => Schema::TYPE_TEXT,
            'content' => Schema::TYPE_TEXT,
            'discount' => Schema::TYPE_SMALLINT.' NOT NULL',
            'merchant_id' => Schema::TYPE_INTEGER.'(11)',
            'quantity' => Schema::TYPE_SMALLINT.' NOT NULL',
            'purchased' => Schema::TYPE_SMALLINT,
            'fake_purchased' => Schema::TYPE_INTEGER,
            'img_url' => Schema::TYPE_STRING,
            'voucher_img_url' => Schema::TYPE_STRING,
            'publish_status' => Schema::TYPE_SMALLINT.' NOT NULL DEFAULT 0',
            'seo_description' => Schema::TYPE_STRING,
            'seo_keywords' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'source' => Schema::TYPE_SMALLINT,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ], $tableOptions);

    }

    public function down()
    {
        echo "m150805_140946_create_deals_table cannot be reverted.\n";

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
