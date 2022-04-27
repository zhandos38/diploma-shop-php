<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment_method}}`.
 */
class m201025_100046_create_payment_method_table extends Migration
{
    public $tableName = '{{%payment_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()
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
