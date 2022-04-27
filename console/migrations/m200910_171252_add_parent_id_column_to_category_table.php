<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%category}}`.
 */
class m200910_171252_add_parent_id_column_to_category_table extends Migration
{
    public $tableName = '{{%category}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'parent_id', $this->integer());

        $this->addForeignKey('fk-category-parent_id-category-id', $this->tableName, 'parent_id', $this->tableName, 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";
    }
}
