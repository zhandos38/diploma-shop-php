<?php
use yii\helpers\Url;

/** @var $product \common\models\Product */
?>
<div class="product-item__outer h-100">
    <div class="product-item__inner px-xl-4 p-3">
        <div class="product-item__body pb-xl-2">
            <?php if (!empty($product->category)): ?>
                <div class="mb-2">
                    <a href="<?= Url::to(['category/index', 'id' => $product->category->id]) ?>" class="font-size-12 text-gray-5">
                        <?= $product->category->name ?>
                    </a>
                </div>
            <?php endif; ?>
            <h5 class="mb-1 product-item__title">
                <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="text-blue font-weight-bold">
                    <?= $product->name ?>
                </a>
            </h5>
            <div class="mb-2">
                <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="d-block text-center">
                    <img class="img-fluid" src="<?= $product->getMainImg() ?>" alt="Image Description">
                </a>
            </div>
            <div class="flex-center-between mb-1">
                <div class="prodcut-price">
                    <div class="text-gray-100"><?= number_format($product->price) ?> ₸</div>
                </div>
                <div class="d-none d-xl-block prodcut-add-cart">
                    <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="btn-add-cart btn-primary transition-3d-hover">
                        <i class="ec ec-add-to-cart"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-item__footer">
            <div class="border-top pt-2 flex-center-between flex-wrap">
                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add_to_wishlist" data-id="<?= $product->id ?>">
                    <i class="ec ec-favorites mr-1 font-size-15"></i> <?= Yii::t('app', 'В список желаемых') ?>
                </a>
            </div>
        </div>
    </div>
</div>
