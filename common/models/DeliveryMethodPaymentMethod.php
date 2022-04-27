<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "delivery_method_payment_method".
 *
 * @property int $id
 * @property int|null $delivery_method_id
 * @property int|null $payment_method_id
 *
 * @property DeliveryMethod $deliveryMethod
 * @property PaymentMethod $paymentMethod
 */
class DeliveryMethodPaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_method_payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_method_id', 'payment_method_id'], 'integer'],
            [['delivery_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryMethod::className(), 'targetAttribute' => ['delivery_method_id' => 'id']],
            [['payment_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::className(), 'targetAttribute' => ['payment_method_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_method_id' => 'Способы оплаты',
            'payment_method_id' => 'Методы оплаты',
        ];
    }

    /**
     * Gets query for [[DeliveryMethod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryMethod()
    {
        return $this->hasOne(DeliveryMethod::className(), ['id' => 'delivery_method_id']);
    }

    /**
     * Gets query for [[PaymentMethod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method_id']);
    }
}
