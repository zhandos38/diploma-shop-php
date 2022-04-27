<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order_item}}`.
 */
class m201223_130428_add_price_in_column_to_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order_item}}', 'price_in', $this->decimal(10,2)->after('cost'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201223_130428_add_price_in_column_to_order_item_table cannot be reverted.\n";

        return false;
    }
}
