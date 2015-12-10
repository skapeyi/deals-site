<?php

use yii\db\Schema;
use yii\db\Migration;

class m151210_132157_change_deal_value_column extends Migration
{
    public function up()
    {
        $this->alterColumn('deal','value','decimal(10,0)');

    }

    public function down()
    {
        echo "m151210_132157_change_deal_value_column cannot be reverted.\n";

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
