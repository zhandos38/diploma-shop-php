<?php

namespace common\models;

use \common\models\base\Product as BaseProduct;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name_ru', 'name_kz', 'name_en', 'name_ch', 'price'], 'required'],
            [['name_ru', 'name_kz', 'name_en', 'name_ch'], 'string', 'max' => 255],
            [['short_description_ru', 'short_description_kz', 'short_description_en', 'short_description_ch'], 'string'],
            [['description_ru', 'description_kz', 'description_en', 'description_ch'], 'string'],
            [['price', 'price_old', 'quantity'], 'number'],

            [['category_id', 'created_at', 'updated_at'], 'integer'],

            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],

            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ]);
    }

}
