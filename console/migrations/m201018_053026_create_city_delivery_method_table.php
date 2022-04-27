<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_method}}`.
 */
class m201018_053026_create_city_delivery_method_table extends Migration
{
    public $tableName = '{{%city_delivery_method}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'method' => $this->tinyInteger(3),
            'value' => $this->decimal(10,2)
        ]);

        $this->addForeignKey('fk-city-method-city_id-city-id', $this->tableName, 'city_id','city', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-city-method-city_id-city-id', $this->tableName);
        $this->dropTable('{{%city_method}}');
    }
}
