<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the base model class for table "review".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $rate
 * @property string $comment
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \common\models\User $createdBy
 * @property \common\models\Product $product
 * @property \common\models\User $updatedBy
 */
class Review extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    const STATUS_ON = 1;
    const STATUS_OFF = 0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['rate', 'status'], 'string', 'max' => 1]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'rate' => 'Оценка',
            'comment' => 'Комментарий',
            'status' => 'Статус',
            'created_by' => 'Автор',
            'updated_by' => 'Обновил',
            'created_at' => 'Время создание',
            'updated_at' => 'Время обновление'
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['id' => 'product_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'updated_by']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
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
     * @return \common\models\ReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ReviewQuery(get_called_class());
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_ON => 'Включен',
            self::STATUS_OFF => 'Отключен'
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}
