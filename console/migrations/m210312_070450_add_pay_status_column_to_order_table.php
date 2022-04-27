<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order}}`.
 */
class m210312_070450_add_pay_status_column_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'pay_status', $this->boolean()->defaultValue(false)->after('payment_method_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210312_070450_add_pay_status_column_to_order_table can not be reverted";

        return false;
    }
}
