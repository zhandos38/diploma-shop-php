<?php
namespace frontend\models;

use common\models\CityDeliveryMethod;
use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use Exception;
use yii\httpclient\Client;
use Yii;
use yii\base\Model;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\imagine\Image;
use yii\web\UploadedFile;

class OrderForm extends Model
{
    public $name;
    public $phone;
    public $address;
    public $region_id;
    public $city_id;
    public $post_code;
    public $amount;
    public $comment;
    public $delivery_cost;
    public $city_delivery_method_id;
    public $payment_method_id;
    public $customer_id;

    public $tempFile;

    public function rules()
    {
        return [
            [['name', 'phone', 'address', 'post_code'], 'string', 'max' => 255],
            ['comment', 'string'],
            [['amount', 'delivery_cost'], 'number'],
            [['name', 'phone', 'address', 'city_delivery_method_id', 'payment_method_id'], 'required'],
            [['region_id', 'city_id', 'city_delivery_method_id', 'payment_method_id', 'customer_id'], 'integer'],

            [['tempFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Полное имя',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'region_id' => 'Область/Регион',
            'city_id' => 'Города/Районы',
            'city_delivery_method_id' => 'Способ доставки',
            'payment_method_id' => 'Метод оплаты',
            'post_code' => 'Почтовый индекс',
            'comment' => 'Комментарий',
            'tempFile' => 'Чек',
        ];
    }

    public function save()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $order = new Order();
            $order->name = $this->name;
            $order->phone = $this->phone;
            $order->address = $this->address;
            $order->post_code = $this->post_code;
            $order->city_id = $this->city_id;
            $order->city_delivery_method_id = $this->city_delivery_method_id;

            $cityDeliveryMethod = CityDeliveryMethod::findOne(['id' => $this->city_delivery_method_id]);
            if ($cityDeliveryMethod === null) {
                throw new \yii\db\Exception('City Delivery Method is not found');
            }

            $order->payment_method_id = $this->payment_method_id;
            $order->comment = $this->comment;
            if (Yii::$app->user->identity) {
                $order->customer_id = Yii::$app->user->getId();
            }

            $session = Yii::$app->session;
            $order->cost = (string)$session['cart.sum'];
            $order->delivery_cost = $order->cost * Product::DELIVERY_RATE;
            $this->amount = $order->cost;

            $this->tempFile = UploadedFile::getInstance($this, 'tempFile');
            if ($this->tempFile) {
                $order->file = $this->tempFile->baseName . '.' . $this->tempFile->extension;
            }

            if (!$this->upload()) {
                throw new Exception('Ошибка загрузки файл чека');
            }

            $order->status = Order::STATUS_NEW;
            if (!$order->save()) {
                throw new Exception('Ошибка при создании заказа');
            }

            $order->number = $order->generateNumber();

            $user = Yii::$app->user->identity;
            if ($user !== null) {
                $order->name = $user->name;
                $order->phone = $user->phone;
                $order->city_id = $user->city_id;
                $order->address = $user->address;
                $order->post_code = $user->post_code;
            }

            if (!$order->save()) {
                throw new Exception('Ошибка при создании заказа');
            }

            foreach ($session['cart'] as $k => $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['id'];
                $orderItem->product_name = $item['name'];
                $orderItem->quantity = (float)$item['qty'];
                $orderItem->cost = (float)$item['price'];
                $orderItem->status = OrderItem::STATUS_COMPLETED;

                if (!$orderItem->save()) {
                    throw new Exception('Ошибка при создании элементов заказа');
                }
            }

            $items = [];
            foreach ($order->orderItems as $item) {
                $items[] = [
                    'productName' => $item->product_name,
                    'initialPrice' => $item->cost,
                    'quantity' => $item->quantity
                ];
            }

            unset($session['cart']);
            unset($session['cart.qty']);
            unset($session['cart.sum']);

            $transaction->commit();

            return $order->id;
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }

    public function upload()
    {
        if ($this->tempFile === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/order';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $filePath = $folderPath . '/' . $this->tempFile->baseName . '.' . $this->tempFile->extension;

        if ($this->validate()) {
            $this->tempFile->saveAs($filePath);
            return Image::resize($filePath,500, 500, true)->save();
        }

        return false;
    }
}