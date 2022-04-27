<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m210329_102101_add_price_and_qty_columns_to_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'price', $this->decimal(10,2)->notNull()->after('code'));
        $this->addColumn($this->tableName, 'price_old', $this->decimal(10,2)->after('price'));
        $this->addColumn($this->tableName, 'quantity', $this->integer()->defaultValue(0)->after('price_old'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
