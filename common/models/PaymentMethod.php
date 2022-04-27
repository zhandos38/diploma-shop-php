<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_method".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property DeliveryMethodPaymentMethod[] $deliveryMethodPaymentMethods
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[DeliveryMethodPaymentMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryMethodPaymentMethods()
    {
        return $this->hasMany(DeliveryMethodPaymentMethod::className(), ['payment_method_id' => 'id']);
    }
}
