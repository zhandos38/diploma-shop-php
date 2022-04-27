<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Product'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'code',
        'price_in',
        'price',
        'old_price',
        'quantity',
        [
            'attribute' => 'category.name',
            'label' => 'Category',
        ],
        'img',
        'description:ntext',
        'short_description',
        'meta_keywords:ntext',
        'meta_description:ntext',
        'type',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerOrderItem->totalCount){
    $gridColumnOrderItem = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'order.name',
                'label' => 'Order'
            ],
                        'product_name',
            'cost',
            'price_in',
            'quantity',
            'status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrderItem,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-item']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order Item'),
        ],
        'columns' => $gridColumnOrderItem
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerProductAttributeValue->totalCount){
    $gridColumnProductAttributeValue = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'productAttribute.name',
                'label' => 'Product Attribute'
            ],
                        'value',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductAttributeValue,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-product-attribute-value']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Product Attribute Value'),
        ],
        'columns' => $gridColumnProductAttributeValue
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerProductImage->totalCount){
    $gridColumnProductImage = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'img',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductImage,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-product-image']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Product Image'),
        ],
        'columns' => $gridColumnProductImage
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerProductOption->totalCount){
    $gridColumnProductOption = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'name',
            'price',
            'quantity',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductOption,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-product-option']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Product Option'),
        ],
        'columns' => $gridColumnProductOption
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerReview->totalCount){
    $gridColumnReview = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'rate',
            'comment:ntext',
            'status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerReview,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-review']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Review'),
        ],
        'columns' => $gridColumnReview
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerWishList->totalCount){
    $gridColumnWishList = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'user.name',
                'label' => 'User'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerWishList,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wish-list']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Wish List'),
        ],
        'columns' => $gridColumnWishList
    ]);
}
?>
    </div>
</div>