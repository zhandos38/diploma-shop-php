<?php

use common\models\Product;
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
<div class="mb-xl-14 mb-6">
    <div class="row">
        <div class="col-md-5 mb-4 mb-md-0">
            <?= $this->render('_images-block', [
                'videoUrl' => $model->video_url,
                'images' => $model->productImages
            ]) ?>
        </div>
        <div class="col-md-7 mb-md-6 mb-lg-0">
            <?= $this->render('_single-product-summary', [
                'model' => $model
            ]) ?>
        </div>
    </div>
</div>
<div class="mb-8">
    <div class="position-relative position-md-static px-md-6">
        <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link active" id="Jpills-two-example1-tab" data-toggle="pill" href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1" aria-selected="true"><?= Yii::t('app', 'Описание') ?></a>
            </li>
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill" href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1" aria-selected="false"><?= Yii::t('app', 'Технические характеристики') ?></a>
            </li>
            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill" href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1" aria-selected="false"><?= Yii::t('app', 'Отзывы') ?></a>
            </li>
        </ul>
    </div>
    <!-- Tab Content -->
    <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
        <div class="tab-content" id="Jpills-tabContent">
            <div class="tab-pane fade active show tab-description" id="Jpills-two-example1" role="tabpanel" aria-labelledby="Jpills-two-example1-tab">
                <?= $model->description ?>
            </div>
            <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel" aria-labelledby="Jpills-three-example1-tab">
                <div class="mx-md-5 pt-1">
                    <h3 class="font-size-18 mb-4"><?= Yii::t('app', 'Технические характеристики') ?></h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <?php foreach ($model->productAttributeValues as $attributeValue): ?>
                                <tr>
                                    <td class="px-4 px-xl-5 border-top-0"><?= $attributeValue->productAttribute->name ?></td>
                                    <td class="border-top-0"><?= $attributeValue->value ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel" aria-labelledby="Jpills-four-example1-tab">
                <?= $this->render('_reviews-tab', [
                    'model' => $model,
                    'reviewForm' => $reviewForm
                ]) ?>
            </div>
        </div>
    </div>
    <!-- End Tab Content -->
</div>