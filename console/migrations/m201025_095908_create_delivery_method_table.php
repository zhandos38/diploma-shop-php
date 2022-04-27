<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_method}}`.
 */
class m201025_095908_create_delivery_method_table extends Migration
{
    public $tableName = '{{%delivery_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->decimal(10,2),
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
