<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m200915_162114_create_product_image_table extends Migration
{
    public $tableName = '{{%product_image}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'img' => $this->string()
        ]);

        $this->addForeignKey('fk-product-image-product_id-product-id', $this->tableName, 'product_id', '{{%product}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
