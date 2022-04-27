<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%revision}}`.
 */
class m201206_161634_create_revision_table extends Migration
{
    public $tableName = '{{%revision}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'balance' => $this->decimal(10,2)->notNull(),
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime()
        ]);

        $this->addForeignKey('fk-revision-created_by', $this->tableName, 'created_by', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-revision-created_by', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
