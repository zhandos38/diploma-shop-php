<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%delivery_method}}`.
 */
class m201025_142412_add_is_default_column_to_delivery_method_table extends Migration
{
    public $tableName = 'delivery_method';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'is_default', $this->boolean()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'is_default');
    }
}
