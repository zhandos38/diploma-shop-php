<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recall}}`.
 */
class m210312_103412_create_recall_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recall}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'status' => $this->tinyInteger(3)->defaultValue(0),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recall}}');
    }
}
