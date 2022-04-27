<?php
/** @var $this \yii\web\View */
/** @var $model \common\models\Product */

use yii\helpers\Url; ?>
<div class="mb-2">
    <div class="border-bottom mb-3 pb-md-1 pb-3">
        <a href="<?= Url::to(['category/index', 'id' => $model->category_id]) ?>" class="font-size-12 text-gray-5 mb-2 d-inline-block"><?= $model->category->name ?></a>
        <h2 class="font-size-25 text-lh-1dot2"><?= $model->name ?></h2>
        <div class="mb-2">
            <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                <div class="text-warning mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="far fa-star text-muted"></small>
                </div>
                <span class="text-secondary font-size-13">(3 отзывов)</span>
            </a>
        </div>
        <div class="d-md-flex align-items-center">
        <div class="ml-md-3 text-gray-9 font-size-14"><?= Yii::t('app', 'В наличии') ?>:
            <?php if ($model->quantity > 0): ?>
                <span class="text-green font-weight-bold"><?= Yii::t('app', 'Есть') ?></span>
            <?php else: ?>
                <span class="text-red font-weight-bold"><?= Yii::t('app', 'Отсутствует') ?></span>
            <?php endif; ?>
        </div>
        </div>
    </div>
    <div class="flex-horizontal-center flex-wrap mb-4">
        <a href="#" class="add_to_wishlist text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> <?= Yii::t('app', 'В желаемое') ?></a>
        <a href="#" class="add-to-compare-link text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> <?= Yii::t('app', 'Сравнить') ?></a>
    </div>
    <div class="mb-2">
        <ul class="font-size-14 pl-3 ml-1 text-gray-110">
            <?php foreach ($model->productAttributeValues as $attribute): ?>
                <li><?= $attribute->productAttribute->name ?>: <?= $attribute->value ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <p><?= $model->shortDescription ?></p>
    <p><strong><?= Yii::t('app', 'Штрихкод') ?></strong>: <?= $model->code ?></p>
    <div class="mb-4">
        <div class="d-flex align-items-baseline">
            <ins id="product-price" class="font-size-36 text-decoration-none"><?= number_format($model->price) ?> ₸</ins>
        </div>
    </div>
    <form id="product-option-form" action="<?= Url::to(['cart/add']) ?>">
        <input type="number" value="<?= $model->id ?>" name="productId" readonly hidden>
        <?php if (!empty($model->productPrices)): ?>
            <div class="mb-4">
                <div class="row">
                    <?php
                    $productPricesArray = [];
                    foreach ($model->productPrices as $key => $productPrice): ?>
                        <div class="col-md-3">
                            <div id="product-price-container-<?= $key ?>" class="product-price-container">
                                <small><?= $productPrice->quantity_min ?> - <?= $productPrice->quantity_max ?> Единиц</small>
                                <div>
                                    <input class="product-price-checkbox" type="radio" name="productPriceId" value="<?= $productPrice->id ?>"> <span class="product-price-container-price" disabled><?= number_format($productPrice->price) ?> ₸</span>
                                </div>
                            </div>
                        </div>

                        <?php $productPricesArray[] = [
                            'id' => $key,
                            'quantity_min' => $productPrice->quantity_min,
                            'quantity_max' => $productPrice->quantity_max,
                            'price' => $productPrice->price
                        ]; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="d-md-flex align-items-end mb-3">
            <div class="max-width-150 mb-4 mb-md-0">
                <h6 class="font-size-14"><?= Yii::t('app', 'Количество') ?></h6>
                <!-- Quantity -->
                <div class="border rounded-pill py-2 px-3 border-color-1">
                    <div class="js-quantity row align-items-center">
                        <div class="col">
                            <input id="add-to-cart-qty-input" class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1" name="qty">
                        </div>
                        <div class="col-auto pr-1">
                            <a id="add-to-cart-minus-btn" class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                <small class="fas fa-minus btn-icon__inner"></small>
                            </a>
                            <a id="add-to-cart-plus-btn" class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                <small class="fas fa-plus btn-icon__inner"></small>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Quantity -->
            </div>
            <div class="ml-md-3">
                <button class="btn px-5 btn-primary-dark transition-3d-hover" type="submit">
                    <i class="ec ec-add-to-cart mr-2 font-size-20"></i>
                    <?= Yii::t('app', 'Добавить в корзину') ?>
                </button>
            </div>
        </div>
    </form>
</div>
<?php if (!empty($model->productPrices)): ?>
<?php
$productPricesArray = \yii\helpers\Json::encode($productPricesArray);
$productPriceDefault = $model->price;
$js =<<<JS
let prices = $productPricesArray;
let priceDefault = "$productPriceDefault";
let quantity = 0;
let flag = true;
$('#add-to-cart-qty-input').change(function() {
    flag = true;
    $('.product-price-container').each(function () {
        $(this).removeClass('product-price-container--active');
        $(this).find('.product-price-checkbox').prop('checked', false);
    });

    quantity = $('#add-to-cart-qty-input').val();
    prices.forEach(function(item) {
        if (quantity >= item['quantity_min'] && quantity <= item['quantity_max']) {
            $('#product-price-container-' + item['id']).addClass('product-price-container--active').find('.product-price-checkbox').prop('checked', true);
            $('#product-price').html(currencyFormatter(parseFloat(item['price'])) + ' ₸');
            flag = false;
        }
        
        if (flag) {
            $('#product-price').html(currencyFormatter(parseFloat(priceDefault)) + ' ₸');
        }
    });
});

$('.product-price-checkbox').click(function(e) {
  e.preventDefault();
});
JS;

$this->registerJs($js);
?>
<?php endif; ?>
