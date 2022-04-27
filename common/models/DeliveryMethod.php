<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "delivery_method".
 *
 * @property int $id
 * @property string|null $name
 * @property boolean|null $is_default
 * @property int|null $crm_code
 *
 * @property CityDeliveryMethod[] $cityDeliveryMethods
 * @property DeliveryMethodPaymentMethod[] $deliveryMethodPaymentMethods
 */
class DeliveryMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            ['is_default', 'boolean'],
            ['crm_code', 'string']
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
     * Gets query for [[CityDeliveryMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCityDeliveryMethods()
    {
        return $this->hasMany(CityDeliveryMethod::className(), ['delivery_method_id' => 'id']);
    }

    /**
     * Gets query for [[DeliveryMethodPaymentMethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryMethodPaymentMethods()
    {
        return $this->hasMany(DeliveryMethodPaymentMethod::className(), ['delivery_method_id' => 'id']);
    }
}
