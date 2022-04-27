<?php
use yii\helpers\Url;
?>
<?php if (!empty($session['cart'])): ?>
<div class="mb-4">
    <h1 class="text-center">Корзина</h1>
</div>
<div class="mb-10 cart-table">
    <form class="mb-4" action="#" method="post">
        <table class="table" cellspacing="0">
            <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Товар</th>
                <th class="product-price">Цена</th>
                <th class="product-quantity w-lg-15">Количество</th>
                <th class="product-subtotal">Итого</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $item): ?>
            <tr>
                <td class="text-center">
                    <a href="javascript:;" class="remove text-gray-32 font-size-26" data-id="<?= $item['id'] ?>">×</a>
                </td>
                <td class="d-none d-md-table-cell">
                    <a href="<?= Url::to(['category/product', 'id' => $item['id']]) ?>">
                        <img class="img-fluid max-width-100 p-1 border border-color-1" src="<?= $item['img'] ?>" alt="Image description">
                    </a>
                </td>

                <td data-title="Товар">
                    <a href="<?= Url::to(['category/product', 'id' => $item['id']]) ?>" class="text-gray-90">
                        <?= $item['name'] ?>
                    </a>
                </td>

                <td data-title="Цена">
                    <span>₸<?= number_format($item['price']) ?></span>
                </td>

                <td data-title="Количество">
                    <span class="sr-only">Количество</span>
                    <!-- Quantity -->
                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                        <div class="js-quantity row align-items-center">
                            <div class="col">
                                <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="<?= $item['qty'] ?>" min="1">
                            </div>
                            <div class="col-auto pr-1">
                                <a class="js-minus minus cart-minus-btn btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" data-id="<?= $item['id'] ?>">
                                    <small class="fas fa-minus btn-icon__inner"></small>
                                </a>
                                <a class="js-plus plus cart-plus-btn btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" data-id="<?= $item['id'] ?>">
                                    <small class="fas fa-plus btn-icon__inner"></small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Quantity -->
                </td>

                <td data-title="Итого">
                    <span class="">₸<?= number_format($item['price'] * $item['qty']) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
<div class="mb-8 cart-total">
    <div class="row">
        <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
            <table class="table mb-3 mb-md-0">
                <tbody>
                <tr class="order-total">
                    <th>Итого</th>
                    <td data-title="Total"><strong><span class="amount">₸<?= number_format($session['cart.sum']) ?></span></strong></td>
                </tr>
                </tbody>
            </table>
            <a class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto mt-5" href="<?= Url::to(['cart/checkout']) ?>" style="float: right">Оформить заказа</a>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="text-center mb-5 mt-5">
        <h2>Ваша корзина пуста</h2>
        <a class="btn btn-primary" href="/">
            Вернутся к покупкам
        </a>
    </div>
<?php endif; ?>
