<?php
use yii\helpers\Url;
?>
<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <?= $this->render('_topbar'); ?>
        <!-- End Topbar -->

        <!-- Logo-Search-header-icons -->
        <div class="py-2 py-xl-5 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="/" aria-label="Alipay">
                                <img src="/images/alipay-logo.png" alt="Alipay.kz">
                            </a>
                            <!-- End Logo -->

                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                    aria-controls="sidebarHeader"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    data-unfold-event="click"
                                    data-unfold-hide-on-scroll="false"
                                    data-unfold-target="#sidebarHeader1"
                                    data-unfold-type="css-animation"
                                    data-unfold-animation-in="fadeInLeft"
                                    data-unfold-animation-out="fadeOutLeft"
                                    data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->

                        <!-- ========== HEADER SIDEBAR ========== -->
                        <?= \frontend\widgets\SidebarWidget::widget() ?>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->
                    <!-- Search Bar -->
                    <div class="col d-none d-xl-block">
                        <form class="js-focus-state" method="get" action="<?= Url::to(['category/search']) ?>">
                            <label class="sr-only" for="searchproduct"><?= Yii::t('app', 'Поиск') ?></label>
                            <div class="input-group">
                                <input class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="query" id="searchproduct-item" placeholder="<?= Yii::t('app', 'Поиск товара') ?>" aria-label="<?= Yii::t('app', 'Поиск товара') ?>" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Search Bar -->
                    <!-- Header Icons -->
                    <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                        <div class="d-inline-flex">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <!-- Search -->
                                <li class="col d-xl-none px-2 px-sm-3 position-static">
                                    <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Search"
                                       aria-controls="searchClassic"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       data-unfold-target="#searchClassic"
                                       data-unfold-type="css-animation"
                                       data-unfold-duration="300"
                                       data-unfold-delay="300"
                                       data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp"
                                       data-unfold-animation-out="fadeOut">
                                        <span class="ec ec-search"></span>
                                    </a>

                                    <!-- Input -->
                                    <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                        <form class="js-focus-state input-group px-3">
                                            <input class="form-control" type="search" placeholder="Search Product">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Input -->
                                </li>
                                <!-- End Search -->
                                <li class="col d-none d-xl-block"><a href="<?= Url::to(['cabinet/wish-list']) ?>" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Желаемые товары"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col d-xl-none px-2 px-sm-3"><a href="<?= Url::to(['cabinet/index']) ?>" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Мой профиль"><i class="font-size-22 ec ec-user"></i></a></li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-xl-none">
                                    <?= \frontend\widgets\CartMobileWidget::widget() ?>
                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
                                    <div id="app-cart">
                                        <?= \frontend\widgets\CartWidget::widget() ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo-Search-header-icons -->

        <!-- Vertical-and-secondary-menu -->
        <div class="d-none d-xl-block container">
            <div class="row">
                <!-- Vertical Menu -->
                <?= \frontend\widgets\CategoryMenuWidget::widget() ?>
                <!-- End Vertical Menu -->
                <!-- Secondary Menu -->
                <div class="col">
                    <!-- Nav -->
                    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                        <!-- Navigation -->
                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                            <ul class="navbar-nav u-header__navbar-nav">

                                <!-- Featured Brands -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link text-sale" href="<?= Url::to(['site/about']) ?>">
                                        <?= Yii::t('app', 'О компании') ?>
                                    </a>
                                </li>
                                <!-- End Featured Brands -->

                                <!-- Delivery Brands -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/delivery']) ?>">
                                        <?= Yii::t('app', 'Доставка') ?>
                                    </a>
                                </li>
                                <!-- End Delivery Brands -->

                                <!-- Payment Brands -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/payment']) ?>">
                                        <?= Yii::t('app', 'Оплата') ?>
                                    </a>
                                </li>
                                <!-- End Payment Brands -->

                                <!-- Contact Styles -->
                                <li class="nav-item u-header__nav-item">
                                    <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/contact']) ?>">
                                        <?= Yii::t('app', 'Контакты') ?>
                                    </a>
                                </li>
                                <!-- End Contact Styles -->

                            </ul>
                        </div>
                        <!-- End Navigation -->
                    </nav>
                    <!-- End Nav -->
                </div>
                <!-- End Secondary Menu -->
            </div>
        </div>
        <!-- End Vertical-and-secondary-menu -->
    </div>
</header>
<!-- ========== END HEADER ========== -->