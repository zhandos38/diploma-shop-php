<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wish_list}}`.
 */
class m201115_160338_create_wish_list_table extends Migration
{
    public $tableName = '{{%wish_list}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-wish-list-product_id-product-id', $this->tableName, 'product_id', 'product', 'id', 'SET NULL');
        $this->addForeignKey('fk-wish-list-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-wish-list-product_id-product-id', $this->tableName);
        $this->dropForeignKey('fk-wish-list-user_id-user-id', $this->tableName);
        $this->dropTable('{{%wish_list}}');
    }
}
