<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%product_id_column_in_order_item}}`.
 */
class m210314_112309_drop_product_id_column_in_order_item_table extends Migration
{
    public $tableName = '{{%order_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-order-item-product_id-product-id', $this->tableName);
        $this->dropColumn($this->tableName, 'product_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210314_112309_drop_product_id_column_in_order_item_table can not be reverted";

        return false;
    }
}
