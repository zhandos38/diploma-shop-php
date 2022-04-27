<?php

namespace common\models;

use \common\models\base\ProductAttribute as BaseProductAttribute;

/**
 * This is the model class for table "product_attribute".
 */
class ProductAttribute extends BaseProductAttribute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['variants'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
