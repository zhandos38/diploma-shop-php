<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m210222_064841_add_short_description_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'short_description', $this->string()->after('description'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210222_064841_add_short_description_column_to_product_table cannot be reverted.\n";

        return false;
    }
}
