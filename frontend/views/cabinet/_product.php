<?php
use yii\helpers\Url;

/* @var $product \common\models\Product */
$product = $model->product;
?>
<div class="product-outer">
    <div class="product-inner">
        <span class="loop-product-categories"><a href="<?= Url::to(['category/index', 'id' => $product->category_id]) ?>" rel="tag"><?= $product->category->name ?></a></span>
        <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>">
            <h3><?= $product->name ?></h3>
            <div class="product-thumbnail">
                <img class="img-responsive w-100" src="<?= $product->getMainImg() ?>" data-echo="<?= $product->getMainImg() ?>" alt="<?= $product->getMainImg() ?>">
            </div>
        </a>

        <div class="price-add-to-cart">
            <span class="price">
                <span class="electro-price">
                    <ins><span class="amount"> <?= number_format($product->price) ?> ₸</span></ins>
                    <?php if ($product->old_price): ?>
                        <del><span class="amount"><?= number_format($product->old_price) ?> ₸</span></del>
                    <?php endif; ?>
                    <span class="amount"> </span>
                </span>
            </span>
            <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="button add_to_cart_button">
                Добавить в корзину
            </a>
        </div><!-- /.price-add-to-cart -->

        <div class="hover-area">
            <div class="action-buttons">
                <a class="button" href="<?= Url::to(['user/unset-favourite', 'id' => $model->id]) ?>"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div><!-- /.product-inner -->
</div><!-- /.product-outer -->