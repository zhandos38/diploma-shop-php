<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m201007_171229_create_region_table extends Migration
{
    public $tableName = '{{%region}}';

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
