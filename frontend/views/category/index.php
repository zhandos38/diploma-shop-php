<?php
/* @var $this \yii\web\View */
/* @var $model \common\models\Category */

$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => $this->title];

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
    <div class="row mb-8">
        <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
            <div class="mb-6">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"><?= Yii::t('app', 'Фильтры') ?></h3>
                </div>

                <?php if ($model->productAttributeCategory): ?>
                    <?php foreach ($model->productAttributeCategory as $item): ?>
                        <div class="border-bottom pb-4 mb-4 category-filter">
                            <h4 class="font-size-14 mb-3 font-weight-bold"><?= $item->productAttribute->name ?></h4>
                            <?php foreach (explode(',', $item->productAttribute->variants) as $index => $variant): ?>
                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="<?= $variant ?>" value="<?= $variant ?>" onclick="Filter.attributes(this)">
                                        <label class="custom-control-label" for="<?= $variant ?>">
                                            <?= $variant ?>
                                        </label>
                                    </div>
                                </div>
                                <!-- End Checkboxes -->
                            <?php endforeach; ?>

                            <!-- View More - Collapse -->
                            <div class="collapse" id="<?= $item->id ?>">
                                <?php foreach (explode(',', $item->productAttribute->variants) as $index => $variant): ?>
                                    <?php if ($index > 6): ?>
                                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="<?= $variant ?>" value="<?= $variant ?>" onclick="Filter.attributes(this)">
                                                <label class="custom-control-label" for="<?= $variant ?>">
                                                    <?= $variant ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- End View More - Collapse -->

                            <!-- Link -->
                            <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#<?= $item->id ?>" role="button" aria-expanded="false" aria-controls="<?= $item->id ?>">
                                <span class="link__icon text-gray-27 bg-white">
                                    <span class="link__icon-inner">+</span>
                                </span>
                                <span class="link-collapse__default"><?= Yii::t('app', 'Показать больше') ?></span>
                                <span class="link-collapse__active"><?= Yii::t('app', 'Показать меньше') ?></span>
                            </a>
                            <!-- End Link -->
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="range-slider">
                    <h4 class="font-size-14 mb-3 font-weight-bold"><?= Yii::t('app', 'Цена') ?></h4>
                    <div class="range mt-1 text-gray-111 d-flex mb-4">
                        <?= Html::input('number', 'price_min', $minProductPrice, ['id' => 'min-price-input', 'class' => 'form-control input-sm text-center js-input-from']) ?>
                        <span class="range-divider">-</span>
                        <?= Html::input('number', 'price_max', $maxProductPrice, ['id' => 'max-price-input', 'class' => 'form-control input-sm text-center js-input-from']) ?>
                    </div>
                    <div id="slider-range"></div>
                    <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg w-100" onclick="Filter.priceRange(this)"><?= Yii::t('app', 'Показать') ?></button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-wd-9gdot5">
            <div class="flex-center-between mb-3">
                <h3 class="font-size-25 mb-0"><?= $model->name ?></h3>
                <p class="font-size-14 text-gray-90 mb-0"><?= Yii::t('app', 'Показано записи') ?> <?= $dataProvider->getCount() ?> <?= Yii::t('app', 'из') ?> <?= $dataProvider->getTotalCount() ?></p>
            </div>
            <!-- End shop-control-bar Title -->
            <!-- Shop-control-bar -->
            <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                <div class="d-xl-none">
                    <!-- Account Sidebar Toggle Button -->
                    <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                       aria-controls="sidebarContent1"
                       aria-haspopup="true"
                       aria-expanded="false"
                       data-unfold-event="click"
                       data-unfold-hide-on-scroll="false"
                       data-unfold-target="#sidebarContent1"
                       data-unfold-type="css-animation"
                       data-unfold-animation-in="fadeInLeft"
                       data-unfold-animation-out="fadeOutLeft"
                       data-unfold-duration="500">
                        <i class="fas fa-sliders-h"></i> <span class="ml-1"><?= Yii::t('app', 'Фильтры') ?></span>
                    </a>
                    <!-- End Account Sidebar Toggle Button -->
                </div>
                <div class="px-3 d-none d-xl-block">
                    <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="false">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    <i class="fa fa-th"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <form method="get">
                        <!-- Select -->
                        <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0" onchange="Filter.sort(this.value)">
                            <?php $sort = Yii::$app->request->get('sort') ?>
                            <option value="default" selected='selected'><?= Yii::t('app', 'По умолчанию') ?></option>
                            <option value="newest" <?= $sort === 'newest' ? 'selected' : '' ?>><?= Yii::t('app', 'Сначала новые') ?></option>
                            <option value="cheap" <?= $sort === 'cheap' ? 'selected' : '' ?>><?= Yii::t('app', 'От дешевых к дорогим') ?></option>
                            <option value="expensive" <?= $sort === 'expensive' ? 'selected' : '' ?>><?= Yii::t('app', 'От дорогих к дешевым') ?></option>
                        </select>
                        <!-- End Select -->
                    </form>
                </div>
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'firstPageCssClass' => 'page-item',
                    'pageCssClass' => 'page-item',
                    'nextPageCssClass' => 'page-item next',
                    'linkOptions' => [
                        'class' => 'page-link'
                    ],
                    'options' => [
                        'class' => 'pagination mb-0 pagination-shop justify-content-center justify-content-md-start'
                    ]
                ]) ?>
            </div>

            <div id="main">
                <?= $this->render('_list', [
                    'dataProvider' => $dataProvider,
                    'categoryName' => $model->name
                ]) ?>
            </div>

            <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                <div class="text-center text-md-left mb-3 mb-md-0"><?= Yii::t('app', 'Показано записи') ?> <?= $dataProvider->getCount() ?> <?= Yii::t('app', 'из') ?> <?= $dataProvider->getTotalCount() ?></div>

                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'firstPageCssClass' => 'page-item',
                    'pageCssClass' => 'page-item',
                    'nextPageCssClass' => 'page-item next',
                    'linkOptions' => [
                        'class' => 'page-link'
                    ],
                    'options' => [
                        'class' => 'pagination mb-0 pagination-shop justify-content-center justify-content-md-start'
                    ]
                ]) ?>
            </nav>
        </div>
    </div>
<?php
$js =<<<JS
let minPrice = parseFloat("$minProductPrice");
let maxPrice = parseFloat("$maxProductPrice");
sliderRange.slider("option", "min", minPrice);
sliderRange.slider("option", "max", maxPrice);
sliderRange.slider("option", "values", [minPrice, maxPrice]);

Filter.categoryId = "$model->id";
JS;

$this->registerJsFile('@web/js/jquery-ui.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/filter.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJs($js, \yii\web\View::POS_LOAD);
?>