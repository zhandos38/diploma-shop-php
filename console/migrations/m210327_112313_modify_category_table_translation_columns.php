<?php

use yii\db\Migration;

/**
 * Class m210327_112313_modify_category_table_translation_columns
 */
class m210327_112313_modify_category_table_translation_columns extends Migration
{
    public $tableName = '{{%category}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'name', 'name_ru');
        $this->addColumn($this->tableName, 'name_kz', $this->string()->after('name_ru'));
        $this->addColumn($this->tableName, 'name_en', $this->string()->after('name_kz'));
        $this->addColumn($this->tableName, 'name_ch', $this->string()->after('name_en'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210327_112313_modify_category_table_translation_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210327_112313_modify_category_table_translation_columns cannot be reverted.\n";

        return false;
    }
    */
}
