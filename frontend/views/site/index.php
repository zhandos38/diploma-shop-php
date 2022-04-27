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
    <!-- Deals-and-tabs -->
    <div class="mb-5">
        <div class="row">
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