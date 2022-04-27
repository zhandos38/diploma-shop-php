<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order_item}}`.
 */
class m210308_083728_add_product_id_column_to_order_item_table extends Migration
{
    public $tableName = '{{%order_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'product_id', $this->integer()->after('order_id'));
        $this->addForeignKey('fk-order-item-product_id-product-id', $this->tableName, 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-item-product_id-product-id', $this->tableName);
        $this->dropColumn($this->tableName, 'product_id');
    }
}
