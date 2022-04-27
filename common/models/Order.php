<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property float $cost
 * @property int|null $customer_id
 * @property int|null $city_id
 * @property int $address
 * @property string $post_code
 * @property string|null $comment
 * @property int|null $status
 * @property int|null $city_delivery_method_id
 * @property int|null $delivery_cost
 * @property int|null $payment_method_id
 * @property boolean|false $pay_status
 * @property string|null $file
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $customer
 * @property City $city
 * @property OrderItem[] $orderItems
 * @property CityDeliveryMethod $cityDeliveryMethod
 * @property PaymentMethod $paymentMethod
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_FINISHED = 2;

    const PAY_STATUS_NO = 0;
    const PAY_STATUS_YES = 1;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cost', 'address'], 'required'],
            [['cost', 'delivery_cost'], 'number'],
            [['customer_id', 'status', 'city_delivery_method_id', 'payment_method_id', 'created_at', 'updated_at'], 'integer'],
            [['comment', 'file'], 'string'],
            [['number', 'name', 'phone', 'email', 'address'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],

            ['pay_status', 'boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер заказа',
            'name' => 'Ф.И.О',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'cost' => 'Стоимость',
            'customer_id' => 'Клиент',
            'city_id' => 'Город/Область',
            'city_delivery_method_id' => 'Способ доставки',
            'delivery_cost' => 'Стоймость доставки',
            'payment_method_id' => 'Способ оплаты',
            'pay_status' => 'Статус оплаты',
            'address' => 'Адрес',
            'comment' => 'Комментарий',
            'status' => 'Статус',
            'file' => 'Чек',
            'created_at' => 'Время создание',
            'updated_at' => 'Время обновление',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public function generateNumber()
    {
        return $this->id . substr((string)time(), -3);
    }

    public static function getStatuses() {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_PROCESSING => 'В процессе',
            self::STATUS_FINISHED => 'Завершен',
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }

    public static function getPayStatuses() {
        return [
            self::PAY_STATUS_NO => 'Не оплачаен',
            self::PAY_STATUS_YES => 'Оплачен'
        ];
    }

    public function getPayStatus()
    {
        return ArrayHelper::getValue(self::getPayStatuses(), $this->pay_status);
    }

    /**
     * Gets query for [[DeliveryMethod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCityDeliveryMethod()
    {
        return $this->hasOne(CityDeliveryMethod::className(), ['id' => 'city_delivery_method_id']);
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

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/order/' . $this->file;
    }
}
