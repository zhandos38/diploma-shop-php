<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m201121_101035_add_blameable_columns_to_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'created_by', $this->integer());
        $this->addColumn($this->tableName, 'updated_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201121_101035_add_blameable_columns_to_product_table cannot be reverted.\n";

        return false;
    }
}
