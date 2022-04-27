<?php
use common\models\Product;
use yii\helpers\Url;

/* @var $model Product */
?>
<div class="product-item__outer h-100">
    <div class="product-item__inner px-xl-4 p-3">
        <div class="product-item__body pb-xl-2">
            <div class="mb-2"><a href="<?= Url::to(['category/index', 'id' => $model->category_id]) ?>" class="font-size-12 text-gray-5"><?= $model->category->name ?></a></div>
            <h5 class="mb-1 product-item__title"><a href="<?= Url::to(['category/product', 'id' => $model->id]) ?>" class="text-blue font-weight-bold"><?= $model->name ?></a></h5>
            <div class="mb-2">
                <a href="<?= Url::to(['category/product', 'id' => $model->id]) ?>" class="d-block text-center">
                    <img class="img-fluid" src="<?= $model->getMainImg() ?>" alt="Image Description">
                </a>
            </div>
            <div class="flex-center-between mb-1">
                <div class="prodcut-price">
                    <div class="text-gray-100"><?= $model->price ?> ₸</div>
                </div>
                <div class="d-none d-xl-block prodcut-add-cart">
                    <a href="<?= Url::to(['category/product', 'id' => $model->id]) ?>" class="btn-add-cart btn-primary transition-3d-hover">
                        <i class="ec ec-add-to-cart"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-item__footer">
            <div class="border-top pt-2 flex-center-between flex-wrap">
                <a href="javascript:void(0)" class="text-gray-6 font-size-13 add_to_wishlist"><i class="ec ec-favorites mr-1 font-size-15"></i> <?= Yii::t('app', 'В желаемые') ?></a>
            </div>
        </div>
    </div>
</div>