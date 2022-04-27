<?php

use yii\db\Migration;

/**
 * Class m201220_172552_delete_lock_column_from_product_table
 */
class m201220_172552_delete_lock_column_from_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%product}}', 'lock');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201220_172552_delete_lock_column_from_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201220_172552_delete_lock_column_from_product_table cannot be reverted.\n";

        return false;
    }
    */
}
