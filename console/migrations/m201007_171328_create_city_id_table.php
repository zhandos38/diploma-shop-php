<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city_id}}`.
 */
class m201007_171328_create_city_id_table extends Migration
{
    public $tableName = '{{%city}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'region_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-city-region_id-region-id', $this->tableName, 'region_id', 'region', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-city-region_id-region-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
