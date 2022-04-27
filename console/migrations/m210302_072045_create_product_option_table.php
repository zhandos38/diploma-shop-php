<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_option}}`.
 */
class m210302_072045_create_product_option_table extends Migration
{
    public $tableName = '{{%product_option}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->decimal(10,2),
            'quantity' => $this->integer()
        ]);

        $this->addForeignKey('fk-product-option-product_id-product-id', $this->tableName, 'product_id', 'product', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
