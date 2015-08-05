<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'firstname'=> Schema::TYPE_STRING.'(32)',
            'lastname' => Schema::TYPE_STRING.'(32)',
            'avatar_url' => Schema::TYPE_STRING . '(64)',
            'url' => Schema::TYPE_STRING.'(64)',
            'password_reset_token' => Schema::TYPE_STRING,
            'phone' => Schema::TYPE_STRING.'(12)',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'merchant' => Schema::TYPE_BOOLEAN.'DEFAULT 0',
            'last_login' => Schema::TYPE_INTEGER,
            'email_notifications' => Schema::TYPE_BOOLEAN,
            'sms_notification' => Schema::TYPE_BOOLEAN,
            'news_letter' => Schema::TYPE_BOOLEAN,
            'new_deal' => Schema::TYPE_BOOLEAN,
            'deal_failed' => Schema::TYPE_BOOLEAN,
            'deal_purchase'=> Schema::TYPE_BOOLEAN,
            'voucher_activated' => Schema::TYPE_BOOLEAN,
            'home_address' =>Schema::TYPE_STRING,
            'home_address_1' => Schema::TYPE_STRING,
            'country' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
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
        $this->dropTable('{{%user}}');
    }
}
