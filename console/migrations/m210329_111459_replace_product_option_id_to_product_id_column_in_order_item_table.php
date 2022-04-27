<?php

use yii\db\Migration;

/**
 * Class m210329_111459_replace_product_option_id_to_product_id_column_in_order_item_table
 */
class m210329_111459_replace_product_option_id_to_product_id_column_in_order_item_table extends Migration
{
    public $tableName = '{{%order_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-order-item-product_option_id-product_option-id', $this->tableName);
        $this->dropColumn($this->tableName, 'product_option_id');

        $this->addColumn($this->tableName, 'product_id', $this->integer()->after('id'));
        $this->addForeignKey('fk-order-item-product_id-product-id', $this->tableName, 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210329_111459_replace_product_option_id_to_product_id_column_in_order_item_table cannot be reverted.\n";

        return false;
    }
}
