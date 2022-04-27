<a href="<?= \yii\helpers\Url::to(['cart/index']) ?>" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Корзина">
    <i class="font-size-22 ec ec-shopping-bag"></i>
    <span class="cart-qty bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12"><?= isset($session['cart.qty']) ?: 0 ?></span>
    <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">₸<?= isset($session['cart.sum']) ? number_format($session['cart.sum']) : 0 ?></span>
</a>