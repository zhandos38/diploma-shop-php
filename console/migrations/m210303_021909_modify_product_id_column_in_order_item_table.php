<?php

use yii\db\Migration;

/**
 * Class m210303_021909_modify_product_id_column_in_order_item_table
 */
class m210303_021909_modify_product_id_column_in_order_item_table extends Migration
{
    public $tableName = '{{%order_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-order-item-product_id-product-id', $this->tableName);
        $this->dropColumn($this->tableName, 'product_id');
        $this->addColumn($this->tableName, 'product_option_id', $this->integer()->after('order_id'));
        $this->addForeignKey('fk-order-item-product_option_id-product_option-id', $this->tableName, 'product_option_id', 'product_option', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210303_021909_modify_product_id_column_in_order_item_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210303_021909_modify_product_id_column_in_order_item_table cannot be reverted.\n";

        return false;
    }
    */
}
