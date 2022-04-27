<?php

use yii\db\Migration;

/**
 * Class m210327_091410_modify_product_table_adding__transaltion_columns
 */
class m210327_091410_modify_product_table_adding__translation_columns extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'name', 'name_ru');
        $this->addColumn($this->tableName, 'name_kz', $this->string()->after('name_ru'));
        $this->addColumn($this->tableName,  'name_en', $this->string()->after('name_kz'));
        $this->addColumn($this->tableName, 'name_ch', $this->string()->after('name_en'));

        $this->renameColumn($this->tableName, 'short_description', 'short_description_ru');
        $this->addColumn($this->tableName, 'short_description_kz', $this->string()->after('short_description_ru'));
        $this->addColumn($this->tableName, 'short_description_en', $this->string()->after('short_description_kz'));
        $this->addColumn($this->tableName, 'short_description_ch', $this->string()->after('short_description_en'));

        $this->renameColumn($this->tableName, 'description', 'description_ru');
        $this->addColumn($this->tableName, 'description_kz', $this->text()->after('description_ru'));
        $this->addColumn($this->tableName, 'description_en', $this->text()->after('description_kz'));
        $this->addColumn($this->tableName, 'description_ch', $this->text()->after('description_en'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210327_091410_modify_product_table_adding__transaltion_columns cannot be reverted.\n";

        return false;
    }
}
