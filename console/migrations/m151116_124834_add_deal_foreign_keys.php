<?php

use yii\db\Schema;
use yii\db\Migration;

class m151116_124834_add_deal_foreign_keys extends Migration
{
    public function up()
    {
        $this->addColumn('deal','category_id', 'integer(11)');
        $this->addForeignKey('deal_fk_category','deal','category_id','category','id','CASCADE','CASCADE');
        // created by and updated by
        $this->addForeignKey('deal_fk_created_by','deal','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('deal_fk_updated_by','deal','updated_by', 'user','id','CASCADE','CASCADE');

        //add the merchant id
        $this->addForeignKey('deal_fk_merchant','deal','merchant_id','user','id','CASCADE','CASCADE');

        // add deal category -- each deal belongs to one category
        //$this->addColumn('deal','category_id','integer(11)');
        //$this->addForeignKey('deal_fk_category','deal','category_id','category','id','CASCADE','CASCADE');
    }

    public function down()
    {
        echo "m151116_124834_add_deal_foreign_keys cannot be reverted.\n";

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
