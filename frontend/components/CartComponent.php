<?php
namespace frontend\components;

use common\models\Product;
use yii\base\Component;


class CartComponent extends Component
{
    public function addItem($product, $qty = null)
    {
        /* @var $product Product */
        if (isset($_SESSION['cart'][$product->id])) {
            if ($qty > 0) {
                $_SESSION['cart'][$product->id]['price'] = $product->price;
                $_SESSION['cart'][$product->id]['qty'] = $qty;
            } elseif ($qty === null) {
                if (empty($_SESSION['cart'][$product->id]['qty'])) {
                    $_SESSION['cart'][$product->id]['qty'] = 1;
                } else {
                    $_SESSION['cart'][$product->id]['qty'] += 1;
                }
            } elseif ($qty === 0) {
                unset($_SESSION['cart'][$product->id]);
            }
        } else {
            $_SESSION['cart'][$product->id] = [
                'id' => $product->id,
                'qty' =>  $qty ?: 1,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->getMainImg()
            ];
        }

        $_SESSION['cart.qty'] = 0;
        $_SESSION['cart.sum'] = 0;

        if (count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                $_SESSION['cart.qty'] += $item['qty'];
                $_SESSION['cart.sum'] += $item['qty'] * $item['price'];
            }
        }
    }

    public function reCalc($id) {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);

        return true;
    }
}