<?php
use yii\helpers\Url;

/** @var $this \yii\web\View */

$session = Yii::$app->session;
?>
<div id="basicDropdownHoverInvoker" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Корзина"
     aria-controls="basicDropdownHover"
     aria-haspopup="true"
     aria-expanded="false"
     data-unfold-event="click"
     data-unfold-target="#basicDropdownHover"
     data-unfold-type="css-animation"
     data-unfold-duration="300"
     data-unfold-delay="300"
     data-unfold-hide-on-scroll="true"
     data-unfold-animation-in="slideInUp"
     data-unfold-animation-out="fadeOut">
    <i class="font-size-22 ec ec-shopping-bag"></i>
    <span class="cart-qty cart-circle-number bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">
        <?= $session['cart.qty'] ?: 0 ?>
    </span>
    <span id="cart-sum" class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">
        <?= $session['cart.sum'] ? number_format($session['cart.sum']) : 0 ?>₸
    </span>
</div>
<div id="basicDropdownHover" class="cart-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-3 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0" aria-labelledby="basicDropdownHoverInvoker">
    <ul id="cart-list" class="list-unstyled px-3 pt-3">
        <?= $this->render('_cart_list', [
            'session' => $session
        ]) ?>
    </ul>
    <div class="flex-center-between px-4 pt-2">
        <a href="<?= Url::to(['cart/index']) ?>" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Отркыть корзину</a>
        <a href="<?= Url::to(['cart/checkout']) ?>" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5">Оформить заказ</a>
    </div>
</div>