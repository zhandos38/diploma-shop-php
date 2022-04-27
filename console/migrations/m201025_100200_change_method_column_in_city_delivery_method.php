<?php

use yii\db\Migration;

/**
 * Class m201025_100200_change_method_column_in_city_delivery_method
 */
class m201025_100200_change_method_column_in_city_delivery_method extends Migration
{
    public $tableName = '{{%city_delivery_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn($this->tableName, 'method', $this->integer());
        $this->renameColumn($this->tableName, 'method', 'delivery_method_id');

        $this->addForeignKey('fk-city-delivery-method-delivery_method_id-delivery-method-id', $this->tableName, 'delivery_method_id', 'delivery_method', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201025_100200_change_method_column_in_city_delivery_method cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201025_100200_change_method_column_in_city_delivery_method cannot be reverted.\n";

        return false;
    }
    */
}
