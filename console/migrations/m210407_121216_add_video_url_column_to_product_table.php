<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m210407_121216_add_video_url_column_to_product_table extends Migration
{
    public $tableName = '{{%product}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'video_url', $this->string(100)->after('type'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210407_121216_add_video_url_column_to_product_table can not be reverted";
        return false;
    }
}
