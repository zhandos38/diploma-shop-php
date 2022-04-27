<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order}}`.
 */
class m201223_122054_add_file_column_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'file', $this->string()->after('payment_method_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201223_122054_add_file_column_to_order_table cannot be reverted.\n";

        return false;
    }
}
