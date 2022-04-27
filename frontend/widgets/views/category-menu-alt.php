<div class="col-md-auto d-none d-xl-flex align-items-end">
    <div class="max-width-270 min-width-270">
        <!-- Basics Accordion -->
        <div id="basicsAccordion">
            <!-- Card -->
            <div class="card border-0 rounded-0">
                <div class="card-header bg-primary rounded-0 card-collapse border-0" id="basicsHeadingOne">
                    <button type="button" class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                            data-toggle="collapse"
                            data-target="#basicsCollapseOne"
                            aria-expanded="true"
                            aria-controls="basicsCollapseOne">
                        <span class="pl-1 text-gray-90"><?= Yii::t('app', 'Все категории') ?></span>
                        <span class="text-gray-90 ml-3">
                            <span class="ec ec-arrow-down-search"></span>
                        </span>
                    </button>
                </div>
                <div id="basicsCollapseOne" class="collapse vertical-menu v1"
                     aria-labelledby="basicsHeadingOne"
                     data-parent="#basicsAccordion">
                    <div class="card-body p-0">
                        <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">
                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                <ul class="navbar-nav u-header__navbar-nav border-primary border-top-0">
                                    <?php
                                    /** @var \common\models\Category $categories */

                                    use yii\helpers\Url;

                                    foreach ($categories as $key => $category): ?>

                                        <?php if ($category->children): ?>
                                            <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                                data-event="hover"
                                                data-animation-in="slideInUp"
                                                data-animation-out="fadeOut"
                                                data-position="left">
                                                <a id="basicMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?= Url::to(['category/product', 'id' => $category->id]) ?>" aria-haspopup="true" aria-expanded="false">
                                                    <?= $category->name ?>
                                                </a>

                                                <!-- Nav Item - Mega Menu -->
                                                <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu">
                                                    <div class="row u-header__mega-menu-wrapper">
                                                        <div class="col mb-3 mb-sm-0">
                                                            <span class="u-header__sub-menu-title">
                                                                <?= $category->name ?>
                                                            </span>
                                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                                <?php foreach ($category->children as $child): ?>
                                                                    <li><a class="nav-link u-header__sub-menu-nav-link" href="#"><?= $child->name ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Nav Item - Mega Menu -->
                                            </li>
                                        <?php else: ?>
                                            <li class="nav-item u-header__nav-item"
                                                data-event="hover"
                                                data-position="left">
                                                <a href="<?= Url::to(['category/index', 'id' => $category->id]) ?>" class="nav-link u-header__nav-link font-weight-bold">
                                                    <?= $category->name ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Basics Accordion -->
    </div>
</div>