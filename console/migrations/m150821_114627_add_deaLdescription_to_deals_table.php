<?php

use yii\db\Schema;
use yii\db\Migration;

class m150821_114627_add_deaLdescription_to_deals_table extends Migration
{
    public function up()
    {
        // add a deal details column on the deals table
        $this->addColumn('deal','details',Schema::TYPE_TEXT);

        // we need to mark some deals as featured, and these will show up on the front page slider
        $this->addColumn('deal', 'featured', Schema::TYPE_BOOLEAN);


        //add a deal categories joint table
        $this->createTable('{{%deal_category}}',[
            'id' => Schema::TYPE_PK,
            'deal_id' => Schema::TYPE_INTEGER.'(11)',
            'category_id' => Schema::TYPE_INTEGER.'(11)',
            'status' => Schema::TYPE_SMALLINT,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
            'created_by' => Schema::TYPE_INTEGER.'(11)',
            'updated_by' => Schema::TYPE_INTEGER. '(11)',
        ]);
        $this->addForeignKey('dc_fk1','deal_category','created_at','user','id','CASCADE','CASCADE');
        $this->addForeignKey('dc_fk2','deal_category','created_by','user','id','CASCADE','CASCADE');

    }

    public function down()
    {
        echo "m150821_114627_add_deaLdescription_to_deals_table cannot be reverted.\n";

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
