<?php
use yii\helpers\Url;
?>
<aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvoker">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">
                <!-- Toggle Button -->
                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                    <button type="button" class="close ml-auto"
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
                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                        <!-- Logo -->
                        <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="/" aria-label="Alipay">
                            <img src="/images/alipay-logo.png" alt="Alipay.kz">
                        </a>
                        <!-- End Logo -->

                        <!-- List -->
                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                            <li>
                                <a class="u-header-collapse__nav-link font-weight-bold text-danger" href="<?= Url::to(['site/discount']) ?>">
                                    <?= Yii::t('app', 'Скидки') ?>
                                </a>
                            </li>
                            <li>
                                <a class="u-header-collapse__nav-link font-weight-bold" href="<?= Url::to(['site/about']) ?>">
                                    <?= Yii::t('app', 'О компании') ?>
                                </a>
                            </li>
                            <li>
                                <a class="u-header-collapse__nav-link font-weight-bold" href="<?= Url::to(['site/delivery']) ?>">
                                    <?= Yii::t('app', 'Доставка') ?>
                                </a>
                            </li>
                            <li>
                                <a class="u-header-collapse__nav-link font-weight-bold" href="<?= Url::to(['site/payment']) ?>">
                                    <?= Yii::t('app', 'Оплата') ?>
                                </a>
                            </li>
                            <li>
                                <a class="u-header-collapse__nav-link font-weight-bold" href="<?= Url::to(['site/contact']) ?>">
                                    <?= Yii::t('app', 'Контакты') ?>
                                </a>
                            </li>
                            <?php
                            /** @var \common\models\Category $categories */
                            foreach ($categories as $key => $category): ?>
                            <?php $identifier = 'index'.$key; ?>
                            <?php if ($category->children): ?>
                                <li class="u-has-submenu u-header-collapse__submenu">
                                    <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#<?= $identifier ?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="<?=$identifier ?>">
                                        <?= $category->name ?>
                                    </a>
                                    <div id="<?= $identifier ?>" class="collapse" data-parent="#headerSidebarContent">
                                        <ul class="u-header-collapse__nav-list">
                                            <?php foreach ($category->children as $child): ?>
                                            <li><a class="u-header-collapse__submenu-nav-link" href="#"><?= $child->name ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a class="u-header-collapse__nav-link font-weight-bold" href="<?= Url::to(['category/index', 'id' => $category->id]) ?>"><?= $category->name ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <!-- End List -->
                    </div>
                </div>
                <!-- End Content -->
            </div>
            <!-- Footer -->
            <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item pr-3">
                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item pr-3">
                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>

                <!-- SVG Background Shape -->
                <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                    <img class="js-svg-injector" src="/svg/components/wave-bottom-with-dots.svg" alt="Image Description"
                         data-parent="#SVGwaveWithDots">
                </div>
                <!-- End SVG Background Shape -->
            </footer>
            <!-- End Footer -->
        </div>
    </div>
</aside>