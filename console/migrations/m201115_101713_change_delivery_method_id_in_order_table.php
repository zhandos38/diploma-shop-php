<?php

use yii\db\Migration;

/**
 * Class m201115_101713_change_delivery_method_id_in_order_table
 */
class m201115_101713_change_delivery_method_id_in_order_table extends Migration
{
    public $tableName = '{{%order}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-order-delivery_method_id-delivery-id', $this->tableName);
        $this->dropColumn($this->tableName, 'delivery_method_id');
        $this->addColumn($this->tableName, 'city_delivery_method_id', $this->integer()->after('status'));
        $this->addForeignKey('fk-order-city_delivery_method_id-city-delivery-method-id', $this->tableName, 'city_delivery_method_id', 'city_delivery_method', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201115_101713_change_delivery_method_id_in_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201115_101713_change_delivery_method_id_in_order_table cannot be reverted.\n";

        return false;
    }
    */
}
