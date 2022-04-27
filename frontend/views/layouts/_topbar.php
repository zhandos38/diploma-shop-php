<?php
use yii\helpers\Url;
?>
<div class="social-network-icons-side">
    <a href="https://www.instagram.com/bibarystuimebek/?hl=ru">
        <img src="/images/instagram-logo.png" alt="instagram">
    </a>
</div>
<script src="//code.jivosite.com/widget/KGXzMY9AJb" async></script>
<div class="u-header-topbar py-2 d-none d-xl-block">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="topbar-left">
                <a href="#" class="text-gray-110 font-size-13 hover-on-dark"><?= Yii::t('app', 'Добро пожаловать в наш интернет магазин') ?></a>
            </div>
            <div class="topbar-right ml-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                        <div class="d-flex align-items-center">
                            <!-- Language -->
                            <div class="position-relative">
                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                   aria-controls="languageDropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="hover"
                                   data-unfold-target="#languageDropdown"
                                   data-unfold-type="css-animation"
                                   data-unfold-duration="300"
                                   data-unfold-delay="300"
                                   data-unfold-hide-on-scroll="true"
                                   data-unfold-animation-in="slideInUp"
                                   data-unfold-animation-out="fadeOut">
                                    <span class="d-inline-block d-sm-none">US</span>
                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="fa fa-language mr-1"></i>
                                    <?php if (Yii::$app->language === 'ru') echo 'Русский' ?>
                                    <?php if (Yii::$app->language === 'kz') echo 'Қазақша' ?>
                                    <?php if (Yii::$app->language === 'en') echo 'English' ?>
                                    <?php if (Yii::$app->language === 'ch') echo '漢語' ?>
                                    </span>
                                </a>

                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                                    <a class="dropdown-item active" href="<?= Url::to(array_merge(\Yii::$app->request->get(), [\Yii::$app->controller->route, 'language' => 'ru'])) ?>">Русский</a>
                                    <a class="dropdown-item" href="<?= Url::to(array_merge(\Yii::$app->request->get(), [\Yii::$app->controller->route, 'language' => 'kz'])) ?>">Қазақша</a>
                                    <a class="dropdown-item" href="<?= Url::to(array_merge(\Yii::$app->request->get(), [\Yii::$app->controller->route, 'language' => 'en'])) ?>">English</a>
                                    <a class="dropdown-item" href="<?= Url::to(array_merge(\Yii::$app->request->get(), [\Yii::$app->controller->route, 'language' => 'ch'])) ?>">漢語</a>
                                </div>
                            </div>
                            <!-- End Language -->
                        </div>
                    </li>
                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                        <div class="d-flex align-items-center">
                            <!-- Language -->
                            <div class="position-relative">
                                <a id="currencyDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                   aria-controls="currencyDropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="hover"
                                   data-unfold-target="#currencyDropdown"
                                   data-unfold-type="css-animation"
                                   data-unfold-duration="300"
                                   data-unfold-delay="300"
                                   data-unfold-hide-on-scroll="true"
                                   data-unfold-animation-in="slideInUp"
                                   data-unfold-animation-out="fadeOut">
                                    <span class="d-inline-block d-sm-none">US</span>
                                    <span class="d-none d-sm-inline-flex align-items-center">₸ Тенге (KZ)</span>
                                </a>

                                <div id="currencyDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="currencyDropdownInvoker">
                                    <a class="dropdown-item active" href="#">₸ Тенге (KZ)</a>
                                    <a class="dropdown-item" href="#">Рубль (RU)</a>
                                    <a class="dropdown-item" href="#">Dollar (US)</a>
                                </div>
                            </div>
                            <!-- End Language -->
                        </div>
                    </li>

                    <?php if (Yii::$app->user->isGuest): ?>
                        <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                               aria-controls="sidebarContent"
                               aria-haspopup="true"
                               aria-expanded="false"
                               data-unfold-event="click"
                               data-unfold-hide-on-scroll="false"
                               data-unfold-target="#sidebarContent"
                               data-unfold-type="css-animation"
                               data-unfold-animation-in="fadeInRight"
                               data-unfold-animation-out="fadeOutRight"
                               data-unfold-duration="500">
                                <i class="ec ec-user mr-1"></i> <?= Yii::t('app', 'Зарегистрироваться') ?> <span class="text-gray-50"><?= Yii::t('app', 'или') ?></span> <?= Yii::t('app', 'Войти') ?>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </li>
                    <?php else: ?>
                        <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                            <div class="d-flex align-items-center">
                                <!-- Language -->
                                <div class="position-relative">
                                    <a id="userDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                       aria-controls="userDropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       data-unfold-event="hover"
                                       data-unfold-target="#userDropdown"
                                       data-unfold-type="css-animation"
                                       data-unfold-duration="300"
                                       data-unfold-delay="300"
                                       data-unfold-hide-on-scroll="true"
                                       data-unfold-animation-in="slideInUp"
                                       data-unfold-animation-out="fadeOut">
                                        <span class="d-inline-block d-sm-none"><i class="fa fa-user-alt"></i> <?= Yii::$app->user->identity->name ?></span>
                                        <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-user"></i> <?= Yii::$app->user->identity->name ?></span>
                                    </a>

                                    <div id="userDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="userDropdownInvoker">
                                        <a class="dropdown-item" href="<?= Url::to(['cabinet/index']) ?>"><?= Yii::t('app', 'Профиль') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['cabinet/orders']) ?>"><?= Yii::t('app', 'История заказов') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['cabinet/wishlist']) ?>"><?= Yii::t('app', 'Избранные товары') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/logout']) ?>"><?= Yii::t('app', 'Выйти') ?></a>
                                    </div>
                                </div>
                                <!-- End Language -->
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
