<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_attributes}}`.
 */
class m201121_074015_create_product_attribute_table extends Migration
{
    public $tableName = '{{%product_attribute}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'variants' => $this->json()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
