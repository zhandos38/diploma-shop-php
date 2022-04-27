<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property string $product_name
 * @property float|null $cost
 * @property int|null $quantity
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Order $order
 * @property Product $product
 */
class OrderItem extends \yii\db\ActiveRecord
{
    const STATUS_COMPLETED = 1;
    const STATUS_RETURNED = 0;
    const STATUS_PARTIAL_RETURN = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity', 'status', 'created_at', 'updated_at'], 'integer'],
            [['product_name'], 'required'],
            [['cost'], 'number'],
            [['product_name'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Заказ',
            'product_id' => 'Товар',
            'product_name' => 'Наименование товара',
            'cost' => 'Цена',
            'quantity' => 'Количество',
            'status' => 'Статус',
            'created_at' => 'Время создание',
            'updated_at' => 'Время обновление',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
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

    public static function getStatuses() {
        return [
            self::STATUS_COMPLETED => 'Завершен',
            self::STATUS_RETURNED => 'Полный возврат',
            self::STATUS_PARTIAL_RETURN => 'Частичный возврат',
        ];
    }

    public function getStatus() {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}
