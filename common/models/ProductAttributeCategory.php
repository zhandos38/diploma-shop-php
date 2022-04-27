<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute_category".
 *
 * @property int $id
 * @property int|null $product_attribute_id
 * @property int|null $category_id
 *
 * @property Category $category
 * @property ProductAttribute $productAttribute
 */
class ProductAttributeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_attribute_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['product_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttribute::className(), 'targetAttribute' => ['product_attribute_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_attribute_id' => 'Product Attribute ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductAttribute]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttribute()
    {
        return $this->hasOne(ProductAttribute::className(), ['id' => 'product_attribute_id']);
    }
}
