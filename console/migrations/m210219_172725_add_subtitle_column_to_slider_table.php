<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%slider}}`.
 */
class m210219_172725_add_subtitle_column_to_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%slider}}', 'subtitle', $this->string()->after('title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201223_130428_add_price_in_column_to_order_item_table cannot be reverted.\n";

        return false;
    }
}
