<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m201127_174136_add_price_in_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'price_in', $this->decimal(10,2)->defaultValue(0)->after('code'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201127_174136_add_price_in_column_to_product_table can not be reverted";

        return false;
    }
}
