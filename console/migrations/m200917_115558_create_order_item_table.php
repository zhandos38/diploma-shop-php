<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m200917_115558_create_order_item_table extends Migration
{
    public $tableName = '{{%order_item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'product_name' => $this->string()->notNull(),
            'cost' => $this->decimal(10,2)->defaultValue(0),
            'quantity' => $this->integer()->defaultValue(0),
            'status' => $this->tinyInteger(2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-order-item-order_id-order-id', $this->tableName, 'order_id', '{{%order}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-order-item-product_id-product-id', $this->tableName, 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
