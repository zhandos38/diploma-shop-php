<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_attribute}}`.
 */
class m201121_110604_add_blameable_column_to_product_attribute_table extends Migration
{
    public $tableName = '{{%product_attribute}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'created_by', $this->integer());
        $this->addColumn($this->tableName, 'updated_by', $this->integer());

        $this->addForeignKey('fk-product-attribute-created_by', $this->tableName, 'created_by', 'user', 'id', 'SET NULL');
        $this->addForeignKey('fk-product-attribute-updated_by', $this->tableName, 'updated_by', 'user', 'id', 'SET NULL');

        $this->addColumn($this->tableName, 'lock', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201121_110604_add_blameable_column_to_product_attribute_table cannot be reverted.\n";

        return false;
    }
}
