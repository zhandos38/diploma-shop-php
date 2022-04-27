<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m201114_162805_add_city_id_and_address_post_code_columns_to_user_table extends Migration
{
    public $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'city_id', $this->integer()->after('phone'));
        $this->addColumn($this->tableName, 'address', $this->string()->after('city_id'));
        $this->addColumn($this->tableName, 'post_code', $this->string(20)->after('address'));

        $this->addForeignKey('fk-user-city_id-city-id', $this->tableName, 'city_id', 'city', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201114_162805_add_city_id_and_address_post_code_columns_to_user_table cannot be reverted.\n";

        return false;
    }
}
