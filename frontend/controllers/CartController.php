<?php


namespace frontend\controllers;

use common\models\City;
use common\models\CityDeliveryMethod;
use common\models\DeliveryMethod;
use common\models\DeliveryMethodPaymentMethod;
use common\models\Order;
use common\models\Product;
use common\models\ProductPrice;
use common\models\Region;
use frontend\models\OrderForm;
use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;

        return $this->render('index', [
            'session' => $session
        ]);
    }

    public function actionUpdate($id)
    {
        $session = Yii::$app->session;
        Yii::$app->cart->reCalc($id);
        return $this->renderAjax('_view', ['session' => $session]);
    }

    public function actionCart()
    {
        $session = !empty($_SESSION['cart']) ? $_SESSION : null;

        return $this->renderAjax('_cart', [
            'session' => $session
        ]);
    }

    public function actionAdd($productId, $qty, $productPriceId = null)
    {
        $product = Product::findOne(['id' => $productId]);
        if ($product === null) {
            return false;
        }

        if ($productPriceId) {
            $productPrice = ProductPrice::findOne(['id' => $productPriceId]);
            $product->price = $productPrice->price;
        }

        Yii::$app->cart->addItem($product, $qty);
        $session = Yii::$app->session;

        return Json::encode([
            'list' => $this->renderAjax('_cart_list', [
                'session' => $session
            ]),
            'qty' => $session['cart.qty'],
            'sum' => $session['cart.sum']
        ]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderAjax('_cart', [
            'session' => $session
        ]);
    }

    public function actionDeleteItem($id)
    {
        $session = Yii::$app->session;
        Yii::$app->cart->reCalc($id);

        return Json::encode([
            'list' => $this->renderAjax('_cart_list', [
                'session' => $session
            ]),
            'qty' => $session['cart.qty'],
            'sum' => $session['cart.sum']
        ]);
    }

    public function actionCheckout()
    {
        $session = !empty($_SESSION['cart']) ? $_SESSION : null;

        if (empty($session)) {
            return $this->redirect(['site/index']);
        }

        $model = new OrderForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Спасибо! Ваш заказ успешно сформирован!');
            return $this->redirect(['site/index']);
        }

        return $this->render('checkout', [
            'model' => $model,
            'session' => $session
        ]);
    }

    public function actionSuccess()
    {
        $request = Yii::$app->request->queryParams;

        if (!$this->checkSign($request, 'success')) {
            throw new Exception('Sig is not correct');
        }

        $model = Order::find()
            ->andWhere(['id' => $request[$this->toProperty('order_id')]])
            ->one();

        if (empty($model)) {
            throw new Exception('Ошибка платежа, платеж не был совершен, попытайтесь снова или свяжитесь с администрацией сайта');
        }

        Yii::$app->session->setFlash('success', 'Ваш заказ успешно сформирован');

        return $this->redirect(['site/index']);
    }

    public function actionGetRegions()
    {
        if (Yii::$app->request->isAjax) {
            $regions = Region::find()->all();
            return Json::encode($regions);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetCities($id = null)
    {
        if (Yii::$app->request->isAjax) {
            if ($id !== null) {
                $cities = City::findAll(['region_id' => $id]);
            } else {
                $cities = City::find()->all();
            }

            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetMainCities()
    {
        if (Yii::$app->request->isAjax) {
            $cities = City::find()->andWhere(['region_id' => null])->all();
            return Json::encode($cities);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetDeliveryMethodsByCity($id)
    {
        if (Yii::$app->request->isAjax) {
            $deliveryMethods = CityDeliveryMethod::findAll(['city_id' => $id]);

            $methods = [];
            if (!empty($deliveryMethods)) {
                foreach ($deliveryMethods as $method) {
                    $methods[] = [
                        'id' => $method->deliveryMethod->id,
                        'name' => $method->deliveryMethod->name,
                        'price' => $method->value
                    ];
                }
            } else {
                $deliveryMethods = DeliveryMethod::findAll(['is_default' => true]);
                foreach ($deliveryMethods as $method) {
                    $methods[] = [
                        'id' => $method->id,
                        'name' => $method->name,
                        'price' => '1000.00'
                    ];
                }
            }

            return Json::encode($methods);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionGetPaymentMethods($id)
    {
        if (Yii::$app->request->isAjax) {
            $paymentMethods = DeliveryMethodPaymentMethod::find()->where(['delivery_method_id' => $id])->all();

            $methods = [];
            foreach ($paymentMethods as $method) {
                $methods[] = [
                    'id' => $method->paymentMethod->id,
                    'name' => $method->paymentMethod->name
                ];
            }

            return Json::encode($methods);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function checkSign($data, $url)
    {
        $array = $data;
        $salt = $array[$this->toProperty('salt')];

        unset($array[$this->toProperty('sig')], $array[$this->toProperty('salt')]);

        $sign = $this->sign($array, $salt, $url);

//        VarDumper::dump($sign . ' - ' . $data[$this->toProperty('sig')]); die;

        return ($sign == $data[$this->toProperty('sig')]);
    }

    private function sign($data, $salt, $url)
    {
        $arr = $data;
        $key = Yii::$app->params['payboxKey'];

        $arr[$this->toProperty('salt')] = $salt;
        ksort($arr);
        array_unshift($arr, $url);
        array_push($arr, $key);
        $arr[$this->toProperty('sig')] = md5(implode(';', $arr));

        return $arr[$this->toProperty('sig')];
    }

    public function getSignByData($data, $url, $salt = null)
    {
        $array = $data;
        $salt = $salt ? $salt : $this->getSalt(8);
        $array[$this->toProperty('salt')] = $salt;
        unset($array[$this->toProperty('sig')]);

        ksort($array);
        array_unshift($array, $url);
        array_push($array,Yii::$app->params['payboxKey']);
        $sign = md5(implode(';', $array));

        $data[$this->toProperty('salt')] = $salt;
        $data[$this->toProperty('sig')] = $sign;

        return $data;
    }

    private function getSalt($length) {
        return bin2hex(random_bytes($length));
    }

    private function toProperty($property)
    {
        return 'pg_' . $property;
    }
}