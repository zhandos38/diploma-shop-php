<?php

$this->title = 'Главная страница';

use common\models\Product;
use common\models\Slider;
use frontend\widgets\CategoryMenuWidget;
use yii\helpers\Url;

?>
<!-- Slider Section -->
<div class="mb-5">
    <div class="bg-img-hero" style="background-image: url(/images/slider-bg-hero.jpg);">
        <div class="container min-height-420 overflow-hidden">
            <div class="js-slick-carousel u-slick"
                 data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 offset-xl-3 pl-2 pb-1">
                <?php
                /** @var Slider[] $sliders */
                /** @var Slider $slider */
                foreach ($sliders as $slider): ?>
                <div class="js-slide bg-img-hero-center">
                    <div class="row min-height-420 py-7 py-md-0">
                        <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                            <h1 class="font-size-64 text-lh-57 font-weight-light mt-5"
                                data-scs-animation-in="fadeInUp">
                                <?= $slider->title ?>
                            </h1>
<!--                            <h6 class="font-size-15 font-weight-bold mb-3"-->
<!--                                data-scs-animation-in="fadeInUp"-->
<!--                                data-scs-animation-delay="200">UNDER FAVORABLE Смарт часы-->
<!--                            </h6>-->
                            <a href="<?= $slider->link ?>" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                               data-scs-animation-in="fadeInUp"
                               data-scs-animation-delay="400">
                                Подробнее
                            </a>
                        </div>
                        <div class="col-xl-5 col-6  d-flex align-items-center"
                             data-scs-animation-in="fadeInRight"
                             data-scs-animation-delay="500">
                            <img class="img-fluid" src="<?= $slider->getImage() ?>" alt="Image Description">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Slider Section -->
<div class="container">
    <!-- Banner -->
    <div class="mb-5">
        <div class="row">
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                <a href="<?= Url::to(['category/index', 'id' => 61]) ?>" class="d-black text-gray-90">
                    <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                        <div class="col-6 col-xl-5 col-wd-6 pr-0">
                            <img class="img-fluid" src="/images/img1.png" alt="Image Description">
                        </div>
                        <div class="col-6 col-xl-7 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                <?= Yii::t('app', 'Новый крутые <strong>Камеры</strong> ждут тебя') ?>
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="<?= Url::to(['category/index', 'id' => 60]) ?>">
                                <?= Yii::t('app', 'Подробнее') ?>
                                <span class="link__icon ml-1">
                                    <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                <a href="<?= Url::to(['category/index', 'id' => 60]) ?>" class="d-black text-gray-90">
                    <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                        <div class="col-6 col-xl-5 col-wd-6 pr-0">
                            <img class="img-fluid" src="/images/img2.jpg" alt="Image Description">
                        </div>
                        <div class="col-6 col-xl-7 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                <?= Yii::t('app', 'Классные скидки на <strong>ноутбуки</strong>') ?>
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="<?= Url::to(['category/index', 'id' => 60]) ?>">
                                <?= Yii::t('app', 'Подробнее') ?>
                                <span class="link__icon ml-1">
                                    <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                <a href="<?= Url::to(['category/index', 'id' => 60]) ?>" class="d-black text-gray-90">
                    <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                        <div class="col-6 col-xl-5 col-wd-6 pr-0">
                            <img class="img-fluid" src="/images/img3.jpg" alt="Image Description">
                        </div>
                        <div class="col-6 col-xl-7 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                <?= Yii::t('app', 'Новое поколение <strong>игровых</strong> компьютеров') ?>
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="<?= Url::to(['category/index', 'id' => 60]) ?>">
                                <?= Yii::t('app', 'Подробнее') ?>
                                <span class="link__icon ml-1">
                                    <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                <a href="<?= Url::to(['category/index', 'id' => 61]) ?>" class="d-black text-gray-90">
                    <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                        <div class="col-6 col-xl-5 col-wd-6 pr-0">
                            <img class="img-fluid" src="/images/img4.png" alt="Image Description">
                        </div>
                        <div class="col-6 col-xl-7 col-wd-6">
                            <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                <?= Yii::t('app', 'Лучшие <strong>наушники</strong> по доступным ценам') ?>
                            </div>
                            <div class="link text-gray-90 font-weight-bold font-size-15" href="<?= Url::to(['category/index', 'id' => 60]) ?>">
                                <?= Yii::t('app', 'Подробнее') ?>
                                <span class="link__icon ml-1">
                                    <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Deals-and-tabs -->
    <div class="mb-5">
        <div class="row">
            <!-- Deal -->
            <div class="col-md-auto mb-6 mb-md-0">
                <div class="p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
                    <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                        <h3 class="font-size-22 mb-0 font-weight-normal text-lh-28 max-width-120">
                            <?= Yii::t('app', 'Специальное предложение') ?>
                        </h3>
                        <div class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1">
                            <span class="font-size-12"><?= Yii::t('app', 'Сэкономь') ?></span>
                            <div class="font-size-20 font-weight-bold">34 500₸</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="<?= Url::to(['category/product', 'id' => 39]) ?>" class="d-block text-center"><img class="img-fluid" src="https://static.alipay.kz/product/фон алипау.jpg" alt="Image Description"></a>
                    </div>
                    <h5 class="mb-2 font-size-14 text-center mx-auto max-width-180 text-lh-18">
                        <a href="<?= Url::to(['category/product', 'id' => 39]) ?>" class="text-blue font-weight-bold">
                            Xiaomi Redmi 10 x Pro 8+ 256Gb
                        </a>
                    </h5>
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <del class="font-size-18 mr-2 text-gray-2">199 900,00 ₸</del>ss
                        <ins class="font-size-30 text-red text-decoration-none">165 400,00 ₸</ins>
                    </div>
                    <div class="mb-3 mx-2">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class=""><?= Yii::t('app', 'Доступно') ?>: <strong>6</strong></span>
                            <span class=""><?= Yii::t('app', 'Уже продано') ?>: <strong>28</strong></span>
                        </div>
                        <div class="rounded-pill bg-gray-3 height-20 position-relative">
                            <span class="position-absolute left-0 top-0 bottom-0 rounded-pill w-30 bg-primary"></span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <h6 class="font-size-15 text-gray-2 text-center mb-3"><?= Yii::t('app', 'Торопись! Предложение заканчивается в') ?>:</h6>
                        <div class="js-countdown d-flex justify-content-center"
                             data-end-date="2021/04/30"
                             data-hours-format="%H"
                             data-minutes-format="%M"
                             data-seconds-format="%S">
                            <div class="text-lh-1">
                                <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                    <span class="js-cd-hours"></span>
                                </div>
                                <div class="text-gray-2 font-size-12 text-center"><?= Yii::t('app', 'ЧАСЫ') ?></div>
                            </div>
                            <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                            <div class="text-lh-1">
                                <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                    <span class="js-cd-minutes"></span>
                                </div>
                                <div class="text-gray-2 font-size-12 text-center"><?= Yii::t('app', 'МИНУТЫ') ?></div>
                            </div>
                            <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                            <div class="text-lh-1">
                                <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                    <span class="js-cd-seconds"></span>
                                </div>
                                <div class="text-gray-2 font-size-12 text-center"><?= Yii::t('app', 'СЕКУНДЫ') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Deal -->
            <!-- Tab Prodcut -->
            <div class="col">
                <!-- Features Section -->
                <div class="">
                    <!-- Nav Classic -->
                    <div class="position-relative bg-white text-center z-index-2">
                        <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <?= Yii::t('app', 'Популярные товары') ?>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <?= Yii::t('app', 'Новые товары') ?>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <?= Yii::t('app', 'Распродажа') ?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Classic -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">
                                <?php
                                /** @var Product[] $newProducts */
                                /** @var Product $product */
                                foreach ($hotProducts as $product): ?>
                                    <li class="col-6 col-wd-3 col-md-4 product-item">
                                        <?= $this->render('_product', [
                                            'product' => $product
                                        ]) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">
                                <?php
                                /** @var Product[] $newProducts */
                                /** @var Product $product */
                                foreach ($newProducts as $product): ?>
                                <li class="col-6 col-wd-3 col-md-4 product-item">
                                    <?= $this->render('_product', [
                                        'product' => $product
                                    ]) ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">
                                <?php
                                /** @var Product[] $newProducts */
                                /** @var Product $product */
                                foreach ($saleProducts as $product): ?>
                                    <li class="col-6 col-wd-3 col-md-4 product-item">
                                        <?= $this->render('_product', [
                                            'product' => $product
                                        ]) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Features Section -->
            </div>
            <!-- End Tab Prodcut -->
        </div>
    </div>
    <!-- End Deals-and-tabs -->
</div>
<!-- Products-4-1-4 -->
<div class="products-group-4-1-4 space-1 bg-gray-7">
    <h2 class="sr-only">Products Grid</h2>
    <!-- Features Section -->
    <div class="container space-2 d-none">
        <!-- Nav Classic -->
        <div class="position-relative text-center z-index-2 mb-3">
            <ul class="nav nav-classic nav-tab nav-tab-sm px-md-3 justify-content-start justify-content-lg-center flex-nowrap flex-lg-wrap overflow-auto overflow-lg-visble border-md-down-bottom-0 pb-1 pb-lg-0 mb-n1 mb-lg-0" id="pills-tab-2" role="tablist">
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link active " id="Gpills-one-example1-tab" data-toggle="pill" href="#Gpills-one-example1" role="tab" aria-controls="Gpills-one-example1" aria-selected="true">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Best Deals
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-two-example1-tab" data-toggle="pill" href="#Gpills-two-example1" role="tab" aria-controls="Gpills-two-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            TV & Video
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-three-example1-tab" data-toggle="pill" href="#Gpills-three-example1" role="tab" aria-controls="Gpills-three-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Камеры
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-four-example1-tab" data-toggle="pill" href="#Gpills-four-example1" role="tab" aria-controls="Gpills-four-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Audio
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-five-example1-tab" data-toggle="pill" href="#Gpills-five-example1" role="tab" aria-controls="Gpills-five-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Smartphones
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-six-example1-tab" data-toggle="pill" href="#Gpills-six-example1" role="tab" aria-controls="Gpills-six-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            GPS & Navi
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-seven-example1-tab" data-toggle="pill" href="#Gpills-seven-example1" role="tab" aria-controls="Gpills-seven-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Computers
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-eight-example1-tab" data-toggle="pill" href="#Gpills-eight-example1" role="tab" aria-controls="Gpills-eight-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Portable Audio
                        </div>
                    </a>
                </li>
                <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                    <a class="nav-link " id="Gpills-nine-example1-tab" data-toggle="pill" href="#Gpills-nine-example1" role="tab" aria-controls="Gpills-nine-example1" aria-selected="false">
                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                            Accessories
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Nav Classic -->
    </div>
    <!-- End Features Section -->
</div>
<!-- End Products-4-1-4 -->
<div class="container">
    <!-- Prodcut-cards-carousel -->
    <div class="space-top-2">
        <dv class=" d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
            <h3 class="section-title mb-0 pb-2 font-size-22"><?= Yii::t('app', 'Вас могут заинтересовать') ?></h3>
            <ul class="nav nav-pills mb-2 pt-3 pt-md-0 mb-0 border-top border-color-1 border-md-top-0 align-items-center font-size-15 font-size-15-md flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                    <a class="text-gray-90 btn btn-outline-primary border-width-2 rounded-pill py-1 px-4 font-size-15 text-lh-19 font-size-15-md" href="#">Топ 20</a>
                </li>
                <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link text-gray-8" href="<?= Url::to(['category/index', 'id' => 59]) ?>"><?= Yii::t('app', 'Телефоны и аксессуары') ?></a>
                </li>
                <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link text-gray-8" href="<?= Url::to(['category/index', 'id' => 60]) ?>"><?= Yii::t('app', 'Компьютеры и оргтехника') ?></a>
                </li>
                <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                    <a class="nav-link text-gray-8" href="<?= Url::to(['category/index', 'id' => 61]) ?>"> <?= Yii::t('app', 'Электроника') ?></a>
                </li>
            </ul>
        </dv>
        <div class="js-slick-carousel u-slick u-slick--gutters-2 overflow-hidden u-slick-overflow-visble pt-3 pb-6"
             data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
            <div class="js-slide">
                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                    <?php foreach ($products as $product): ?>
                    <li class="col-wd-3 col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner p-md-3 row no-gutters">
                                <div class="col col-lg-auto product-media-left">
                                    <a href="<?= Url::to(['category/product', 'id' =>  $product->id]) ?>" class="max-width-150 d-block"><img class="img-fluid" src="<?= $product->getMainImg() ?>" alt="Image Description"></a>
                                </div>
                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                    <div class="mb-4">
                                        <?php if ($product->category): ?>
                                        <div class="mb-2">
                                            <a href="<?= Url::to(['category/index', 'id' =>  $product->category_id]) ?>" class="font-size-12 text-gray-5">
                                                <?= $product->category->name ?>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <h5 class="product-item__title">
                                            <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="text-blue font-weight-bold">
                                                <?= $product->name ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="flex-center-between mb-3">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100"><?= number_format($product->price) ?> ₸</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="<?= Url::to(['category/product', 'id' => $product->id]) ?>" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                            <a href="javascript:;" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> <?= Yii::t('app', 'В желаемое') ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Prodcut-cards-carousel -->
    <!-- Full banner -->
    <div class="mb-6">
        <a href="<?= Url::to(['category/index', 'id' => 60]) ?>" class="d-block text-gray-90">
            <div class="" style="background-image: url(/img/img1.jpg);">
                <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                    <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                        <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1"><?= Yii::t('app', 'Сэкономьте <strong>больше</strong> на покупке планшетов') ?></h1>
                        <div class="ml-5 flex-content-center flex-shrink-0">
                            <div class="bg-primary rounded-lg px-6 py-2">
                                <em class="font-size-14 font-weight-light"><?= Yii::t('app', 'Начинается от') ?></em>
                                <div class="font-size-30 font-weight-bold text-lh-1">
                                    <sup class="">₸</sup>7999<sup class="">99</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- End Full banner -->
    <!-- Recently viewed -->
    <div class="mb-6">
        <div class="position-relative">
            <div class="border-bottom border-color-1 mb-2">
                <h3 class="section-title mb-0 pb-2 font-size-22"><?= Yii::t('app', 'Последние просмотренные') ?></h3>
            </div>
            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                 data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                 data-slides-show="7"
                 data-slides-scroll="1"
                 data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                 data-arrow-left-classes="fa fa-angle-left right-1"
                 data-arrow-right-classes="fa fa-angle-right right-0"
                 data-responsive='[{
                              "breakpoint": 1400,
                              "settings": {
                                "slidesToShow": 6
                              }
                            }, {
                                "breakpoint": 1200,
                                "settings": {
                                  "slidesToShow": 4
                                }
                            }, {
                              "breakpoint": 992,
                              "settings": {
                                "slidesToShow": 3
                              }
                            }, {
                              "breakpoint": 768,
                              "settings": {
                                "slidesToShow": 2
                              }
                            }, {
                              "breakpoint": 554,
                              "settings": {
                                "slidesToShow": 2
                              }
                            }]'>
                <?php foreach ($products as $product): ?>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <?= $this->render('_product', [
                            'product' => $product
                        ]) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Recently viewed -->
    <div class="items-container">
        <div class="item">
            <img id="map-icon" class="item-icon" src="/img/shopping-bag.png">
            <p class="item-details"><?= Yii::t('app', 'Качественный товар') ?></p>
        </div>
        <div class="item">
            <img class="item-icon" id="coin-icon" src="/img/headset.png">
            <p class="item-details"><?= Yii::t('app', 'Круглосуточный сервис') ?></p>
        </div>
        <div class="item">
            <img class="item-icon" id="comparison-icon" src="/img/delivery-truck.png">
            <p class="item-details"><?= Yii::t('app', 'Экспресс-доставка') ?></p>
        </div>
        <div class="item">
            <img class="item-icon" id="laptop-icon" src="/img/online-payment.png">
            <p class="item-details"><?= Yii::t('app', 'Безопасная оплата') ?></p>
        </div>
    </div>
</div>