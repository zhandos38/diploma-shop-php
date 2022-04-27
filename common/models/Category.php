<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_kz
 * @property string $name_en
 * @property string $name_ch
 * @property integer $parent_id
 * @property boolean $is_main
 *
 * @property Product[] $products
 * @property Category $parent
 * @property ProductAttributeCategory $productAttributeCategory
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_kz', 'name_en', 'name_ch'], 'required'],
            [['name_ru', 'name_kz', 'name_en', 'name_ch'], 'string', 'max' => 255],
            [['parent_id', 'is_main'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название (RU)',
            'name_kz' => 'Название (KZ)',
            'name_en' => 'Название (EN)',
            'name_ch' => 'Название (CH)',
            'parent_id' => 'Родитель',
            'is_main' => 'Главный'
        ];
    }

    public function getName() {
        switch (Yii::$app->language) {
            case 'ru':
                return $this->name_ru;
                break;
            case 'kz':
                return $this->name_kz;
                break;
            case 'en':
                return $this->name_en;
                break;
            case 'ch':
                return $this->name_ch;
                break;
        }

        return false;
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeCategory()
    {
        return $this->hasMany(ProductAttributeCategory::className(), ['category_id' => 'id']);
    }
}
