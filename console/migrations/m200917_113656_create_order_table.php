<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m200917_113656_create_order_table extends Migration
{
    public $tableName = '{{%order}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'number' => $this->string()->notNull(),
            'full_name' => $this->string()->notNull(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'cost' => $this->decimal(10,2)->notNull(),
            'customer_id' => $this->integer(),
            'address' => $this->integer()->notNull(),
            'comment' => $this->text(),
            'status' => $this->tinyInteger(2)->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-order-customer_id-user-id', $this->tableName, 'customer_id', '{{%user}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
