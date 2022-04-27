<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "product_attribute".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $variants
 *
 * @property \common\models\ProductAttributeCategory[] $productAttributeCategories
 * @property \common\models\ProductAttributeValue[] $productAttributeValues
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['variants'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'variants' => 'Варианты',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeCategories()
    {
        return $this->hasMany(\common\models\ProductAttributeCategory::className(), ['product_attribute_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeValues()
    {
        return $this->hasMany(\common\models\ProductAttributeValue::className(), ['product_attribute_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\ProductAttributeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ProductAttributeQuery(get_called_class());
    }
}
