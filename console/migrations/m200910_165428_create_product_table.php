<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200910_165428_create_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'quantity' => $this->integer()->defaultValue(0),
            'category_id' => $this->integer(),
            'img' => $this->string(),
            'description' => $this->text(),
            'type' => $this->tinyInteger(2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-product-category_id-category-id', $this->tableName, 'category_id', '{{%category}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
