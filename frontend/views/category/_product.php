<?php

use kartik\widgets\StarRating;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var \common\models\Product $model */
/* @var \common\models\ProductImage $image */

$this->title = $model->name;

if ($model->category) {
    $this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => Url::to(['category/index', 'id' => $model->category_id])];
}
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <?php if ($model->images): ?>
                            <?php foreach ($model->images as $image): ?>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="<?= $image->getImgPath() ?>" data-gall="myGallery">
                                    <img src="<?= $image->getImgPath() ?>" alt="product image">
                                </a>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="/images/no-image.jpg" data-gall="myGallery">
                                    <img src="/images/no-image.jpg" alt="product image">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-details-thumbs slider-thumbs-1">
                        <?php foreach ($model->images as $image): ?>
                        <div class="sm-image"><img src="<?= $image->getImgPath() ?>" alt="product image thumb"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2><?= $model->name ?></h2>
                        <?php if ($model->category): ?>
                        <span class="product-details-ref"><?= $model->category->name ?></span>
                        <?php endif; ?>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <?php for($i = 0; $i < $model->getRating(); $i++): ?>
                                <li><i class="fa fa-star"></i></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">₸<?= $model->price ?></span>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <div class="quantity">
                                    <label><?= Yii::t('app', 'Количество') ?></label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" data-id="<?= $model->id ?>" type="button"><?= Yii::t('app', 'В корзину') ?></button>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <a class="favourite-btn" <?= Yii::$app->user->isGuest ? 'isDisabled' : '' ?> data-id="<?= $model->id ?>" href="javascript:void(0)"><i class="fa fa-heart-o"></i> <?= Yii::t('app', 'Добавить в избранное') ?></a>
<!--                            <div class="product-social-sharing pt-25">-->
<!--                                <ul>-->
<!--                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>-->
<!--                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>-->
<!--                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>-->
<!--                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span><?= Yii::t('app', 'Описание') ?></span></a></li>
                        <li><a data-toggle="tab" href="#attributes"><span><?= Yii::t('app', 'Характеристики') ?></span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span><?= Yii::t('app', 'Отзывы') ?></span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <?= $model->description ?>
                </div>
            </div>
            <div id="attributes" class="tab-pane" role="tabpanel">
                <div class="product-description">
                    <?php if ($model->productAttributeValues): ?>
                    <?php foreach ($model->productAttributeValues as $item): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $item->productAttribute->name ?>
                        </div>
                        <div class="col-md-4">
                            <b><?= $item->value ?></b>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p><?= Yii::t('app', 'Характеристики не указаны') ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div>
                            <div>Оценили <?php $reviewsQuantity = count($model->reviews); echo $reviewsQuantity ?> <?= $reviewsQuantity > 1 ? 'раза' : 'раз' ?></div>
                            <div>Средняя оценка:</div>
                            <?= StarRating::widget([
                                'name' => 'rating_2',
                                'value' => $model->getRating(),
                                'pluginOptions' => [
                                    'filledStar' => '<i class="fa fa-star"></i>',
                                    'emptyStar' => '<i class="fa fa-star-o"></i>',
                                    'showClear' => false,
                                ],
                                'disabled' => true
                            ]); ?>
                        </div>
                        <?php if ($model->reviews): ?>
                        <?php foreach ($model->reviews as $review): ?>
                        <div class="comment-author-infos p-3" style="border-top: 1px solid #ccc">
                            <span><?= $review->createdBy->name ?></span>
                            <div class="rating-box">
                                <ul class="rating">
                                    <?php for($i = 0; $i < $review->rate; $i++): ?>
                                    <li><i class="fa fa-star"></i></li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                            <em><?= htmlspecialchars_decode($review->comment) ?></em>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p><?= Yii::t('app', 'Обзоров не найдено') ?></p>
                        <?php endif; ?>
                        <div class="review-btn" style="margin-top: 40px">
                            <a class="review-links" href="#"><?= Yii::t('app', 'Оставьте отзыв') ?></a>
                        </div>
                        <div class="review-form" style="display: none">
                            <?php if (!Yii::$app->user->isGuest): ?>
                            <?php $form = ActiveForm::begin() ?>

                            <?= $form->field($reviewForm, 'product_id')->hiddenInput(['value' => $model->id])->label(false) ?>

                            <?= $form->field($reviewForm, 'rate')->widget(StarRating::classname(), [
                                'pluginOptions' => [
                                    'step' => 1,
                                    'filledStar' => '<i class="fa fa-star"></i>',
                                    'emptyStar' => '<i class="fa fa-star-o"></i>',
                                    'showClear' => false
                                ]
                            ]); ?>

                            <?= $form->field($reviewForm, 'comment')->widget(Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 200
                                ],
                            ]); ?>

                            <?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

                            <?php ActiveForm::end() ?>
                            <?php else: ?>
                            <p class="text-danger pt-3"><?= Yii::t('app', 'Чтобы оставить отзыв необходимо зарегистрироваться') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->