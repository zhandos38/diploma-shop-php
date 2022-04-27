<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m201201_164757_add_seo_columns_to_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'meta_keywords', $this->text()->after('description'));
        $this->addColumn($this->tableName, 'meta_description', $this->text()->after('meta_keywords'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201201_164757_add_seo_columns_to_product_table can not be reverted";

        return false;
    }
}
