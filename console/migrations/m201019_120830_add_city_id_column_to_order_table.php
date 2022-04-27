<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%order}}`.
 */
class m201019_120830_add_city_id_column_to_order_table extends Migration
{
    public $tableName = 'order';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'city_id', $this->integer()->after('address'));
        $this->addForeignKey('fk-order-city_id-city-id', $this->tableName, 'city_id', 'city', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-city_id-city-id', $this->tableName);
        $this->dropColumn($this->tableName, 'city_id');
    }
}
