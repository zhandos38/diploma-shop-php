<?php


namespace frontend\widgets;


use yii\base\Widget;

class CartWidget extends Widget
{
    public function run()
    {
        $session = !empty($_SESSION['cart']) ? $_SESSION : null;

        return $this->render('@frontend/views/cart/_cart', [
            'session' => $session
        ]);
    }
}