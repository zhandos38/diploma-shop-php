<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_attribute_value}}`.
 */
class m201121_074058_create_product_attribute_value_table extends Migration
{
    public $tableName = '{{%product_attribute_value}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_attribute_id' => $this->integer(),
            'product_id' => $this->integer(),
            'value' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-product-attribute-value-attribute_id-product-attribute-id',
            $this->tableName,
            'product_attribute_id',
            '{{%product_attribute}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-attribute-value-product_id-product-id',
            $this->tableName,
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
