<?php

use yii\db\Migration;

/**
 * Class m201025_144841_alter_delivery_method_column_in_order_table
 */
class m201025_144842_alter_delivery_method_column_in_order_table extends Migration
{
    public $tableName = 'order';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'payment_method', 'payment_method_id');
        $this->addForeignKey('fk-order-payment_method_id-delivery-id', $this->tableName, 'payment_method_id', 'payment_method', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201025_144841_alter_delivery_method_column_in_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201025_144841_alter_delivery_method_column_in_order_table cannot be reverted.\n";

        return false;
    }
    */
}
