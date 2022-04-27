<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%price_and_quantity_column_in_product}}`.
 */
class m210327_082332_drop_price_and_quantity_column_in_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'price_in');
        $this->dropColumn($this->tableName, 'price');
        $this->dropColumn($this->tableName, 'old_price');
        $this->dropColumn($this->tableName, 'quantity');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210327_082332_drop_price_and_quantity_column_in_product_table can not be reverted";

        return false;
    }
}
