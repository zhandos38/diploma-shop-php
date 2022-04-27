<?php
/* @var $this \yii\web\View */
/* @var $products array */
/* @var $product \common\models\Product */

$this->title = Yii::t('app', 'Поиск товара');

$this->params['breadcrumbs'][] = ['label' => $this->title];

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
?>
<header class="page-header">
    <h1 class="page-title"><?= Yii::t('app', 'Поиск') ?>: <?= $query ?></h1>
</header>

<?php if (!empty($products)): ?>
<!-- Tab Content -->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
        <ul class="row list-unstyled products-group no-gutters">
            <?php foreach ($products as $product): ?>
            <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                <?= $this->render('_item', [
                    'model' => $product
                ]) ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php else: ?>
<h2><?= Yii::t('app', 'Ничего не найдено') ?></h2>
<?php endif; ?>
<div class="shop-control-bar-bottom">
    <nav class="woocommerce-pagination">
        <?= LinkPager::widget([
            'pagination' => $pages,
            'firstPageCssClass' => 'page-numbers current',
            'pageCssClass' => 'page-numbers',
            'nextPageCssClass' => 'next page-numbers',
            'options' => [
                'class' => 'page-numbers'
            ]
        ]) ?>
    </nav>
</div>