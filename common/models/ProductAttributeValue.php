<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute_value".
 *
 * @property int $id
 * @property int|null $product_attribute_id
 * @property int|null $product_id
 * @property string|null $value
 *
 * @property ProductAttribute $productAttribute
 * @property Product $product
 */
class ProductAttributeValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_attribute_id', 'product_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['product_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttribute::className(), 'targetAttribute' => ['product_attribute_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
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
            'product_id' => 'Product ID',
            'value' => 'Value',
        ];
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

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
