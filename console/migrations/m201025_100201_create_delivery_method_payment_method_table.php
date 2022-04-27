<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_method_payment_method}}`.
 */
class m201025_100201_create_delivery_method_payment_method_table extends Migration
{
    public $tableName = '{{%delivery_method_payment_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'delivery_method_id' => $this->integer(),
            'payment_method_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk-delivery-method-delivery_method_id-delivery-method-id', $this->tableName, 'delivery_method_id', 'delivery_method', 'id', 'SET NULL');
        $this->addForeignKey('fk-payment-method-payment_method_id-payment-method-id', $this->tableName, 'payment_method_id', 'payment_method', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-delivery-method-delivery_method_id-delivery-method-id', $this->tableName);
        $this->dropForeignKey('fk-payment-method-delivery_method_id-payment-method-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
