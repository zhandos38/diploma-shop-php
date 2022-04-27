<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%delivery_method}}`.
 */
class m201210_083154_add_crm_id_column_to_delivery_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%delivery_method}}', 'crm_code', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201210_083154_add_crm_id_column_to_delivery_method_table can not be reverted";
        return false;
    }
}
