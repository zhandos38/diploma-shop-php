<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_delivery_method".
 *
 * @property int $id
 * @property int|null $city_id
 * @property int|null $delivery_method_id
 * @property float|null $value
 *
 * @property DeliveryMethod $deliveryMethod
 * @property City $city
 */
class CityDeliveryMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city_delivery_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'delivery_method_id'], 'integer'],
            [['value'], 'number'],
            [['delivery_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryMethod::className(), 'targetAttribute' => ['delivery_method_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],

            [['city_id', 'delivery_method_id', 'value'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'delivery_method_id' => 'Способы доставки',
            'value' => 'Цена',
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
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
