<?php

use yii\db\Migration;

/**
 * Class m201114_171714_rename_full_name_column_in_order_table
 */
class m201114_171714_rename_full_name_column_in_order_table extends Migration
{
    public $tableName = '{{%order}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'full_name', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201114_171714_rename_full_name_column_in_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201114_171714_rename_full_name_column_in_order_table cannot be reverted.\n";

        return false;
    }
    */
}
