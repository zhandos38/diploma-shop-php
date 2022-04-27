<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m201203_073712_create_review_table extends Migration
{
    public $tableName = '{{%review}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'rate' => $this->tinyInteger(1),
            'comment' => $this->text(),
            'status' => $this->boolean(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-review-product_id', $this->tableName, 'product_id', 'product', 'id', 'SET NULL');
        $this->addForeignKey('fk-review-created_by', $this->tableName, 'created_by', 'user', 'id', 'SET NULL');
        $this->addForeignKey('fk-review-updated_by', $this->tableName, 'updated_by', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-review-created_by', $this->tableName);
        $this->dropForeignKey('fk-review-updated_by', $this->tableName);
        $this->dropForeignKey('fk-review-product_id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
