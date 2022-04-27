<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%user}}`.
 */
class m201114_171350_drop_surname_column_from_user_table extends Migration
{
    public $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'surname');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201114_171350_drop_surname_column_from_user_table cannot be reverted.\n";

        return false;
    }
}
