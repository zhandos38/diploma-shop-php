<?php
use yii\helpers\Url;
?>
<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <?= $this->render('_topbar'); ?>
        <!-- End Topbar -->

        <!-- Logo and Menu -->
        <div class="py-2 py-xl-4 bg-primary-down-lg">
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
                    <!-- Primary Menu -->
                    <div class="col d-none d-xl-block">
                        <!-- Nav -->
                        <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                            <!-- Navigation -->
                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav">
                                    <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link text-danger" href="<?= Url::to(['site/about']) ?>"><?= Yii::t('app', 'О компании') ?></a>
                                    </li>
                                    <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/delivery']) ?>"><?= Yii::t('app', 'Доставка') ?></a>
                                    </li>
                                    <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/payment']) ?>"><?= Yii::t('app', 'Оплата') ?></a>
                                    </li>
                                    <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Navigation -->
                        </nav>
                        <!-- End Nav -->
                    </div>
                    <!-- End Primary Menu -->
                    <!-- Customer Care -->
                    <div class="d-none d-xl-block col-md-auto">
                        <div class="d-flex">
                            <i class="ec ec-support font-size-50 text-primary"></i>
                            <div class="ml-2">
                                <div class="phone">
                                    <strong>Поддержка:</strong> <a href="tel:87770954028" class="text-gray-90">+7(777) 095 40 28</a>
                                </div>
                                <div class="email">
                                    E-mail: <a href="mailto:info@electro.com?subject=Help Need" class="text-gray-90">info@alipay.kz</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Customer Care -->
                    <!-- Header Icons -->
                    <div class="d-xl-none col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
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
                                <li class="col d-none d-xl-block"><a href="<?= Url::to(['cabinet/wish-list']) ?>" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col d-xl-none px-2 px-sm-3"><a href="<?= Url::to(['cabinet/index']) ?>" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Мой профиль"><i class="font-size-22 ec ec-user"></i></a></li>
                                <li class="col pr-xl-0 px-2 px-sm-3">
                                    <?= \frontend\widgets\CartMobileWidget::widget() ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Logo and Menu -->

        <!-- Vertical-and-Search-Bar -->
        <div class="d-none d-xl-block bg-primary">
            <div class="container">
                <div class="row align-items-stretch min-height-50">
                    <!-- Vertical Menu -->
                    <?= \frontend\widgets\CategoryMenuAltWidget::widget() ?>
                    <!-- End Vertical Menu -->
                    <!-- Search bar -->
                    <div class="col align-self-center">
                        <!-- Search-Form -->
                        <form class="js-focus-state" method="get" action="<?= Url::to(['category/search']) ?>">
                            <label class="sr-only" for="searchProduct">Поиск</label>
                            <div class="input-group">
                                <input class="form-control py-2 pl-5 font-size-15 border-0 height-40 rounded-left-pill" name="query" id="searchProduct" placeholder="Поиск товара" aria-label="Поиск товара" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <button class="btn btn-dark height-40 py-2 px-3 rounded-right-pill" type="button" id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End Search-Form -->
                    </div>
                    <!-- End Search bar -->
                    <!-- Header Icons -->
                    <div class="col-md-auto align-self-center">
                        <div class="d-flex">
                            <ul class="d-flex list-unstyled mb-0">
                                <li class="col"><a href="<?= Url::to(['cabinet/wish-list']) ?>" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Желаемые товары"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                <li class="col pr-0">
                                    <div id="app-cart" class="cart-alt">
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
        <!-- End Vertical-and-secondary-menu -->
    </div>
</header>