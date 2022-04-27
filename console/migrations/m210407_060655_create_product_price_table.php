<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_price}}`.
 */
class m210407_060655_create_product_price_table extends Migration
{
    public $tableName = '{{%product_price}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'quantity_min' => $this->smallInteger(),
            'quantity_max' => $this->smallInteger(),
            'price' => $this->decimal(10,2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-product-price-product_id-product-id', $this->tableName, 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_price}}');
    }
}
