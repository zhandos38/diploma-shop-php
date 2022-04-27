<?php

namespace common\models;

use \common\models\base\Revision as BaseRevision;

/**
 * This is the model class for table "revision".
 */
class Revision extends BaseRevision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['balance'], 'required'],
            [['balance'], 'number'],
            [['created_by', 'created_at'], 'integer']
        ]);
    }
	
}
