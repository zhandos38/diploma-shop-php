<?php

namespace common\models;

use \common\models\base\Review as BaseReview;

/**
 * This is the model class for table "review".
 */
class Review extends BaseReview
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rate', 'status'], 'string', 'max' => 1]
        ]);
    }
	
}
