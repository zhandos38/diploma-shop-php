<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_attribute_category}}`.
 */
class m201121_074202_create_product_attribute_category_table extends Migration
{
    public $tableName = '{{%product_attribute_category}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_attribute_id' => $this->integer(),
            'category_id' => $this->integer()
        ]);

        // Fk
        $this->addForeignKey(
            'fk-product-attribute-category-product_attribute_id',
            $this->tableName,
            'product_attribute_id',
            '{{%product_attribute}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-attribute-category-category_id',
            $this->tableName,
            'category_id',
            '{{%category}}',
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
