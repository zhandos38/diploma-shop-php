<?php


namespace frontend\widgets;


use yii\base\Widget;

class CartMobileWidget extends Widget
{
    public function run()
    {
        $session = !empty($_SESSION['cart']) ? $_SESSION : null;

        return $this->render('@frontend/views/cart/_cart_mobile', [
            'session' => $session
        ]);
    }
}