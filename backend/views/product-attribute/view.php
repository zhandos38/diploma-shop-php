<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductAttribute */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Attribute', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Product Attribute'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Назад', ['index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Редактивировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
        'type',
        'variants:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerProductAttributeCategory->totalCount){
    $gridColumnProductAttributeCategory = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'category.name',
                'label' => 'Category'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductAttributeCategory,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-product-attribute-category']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Product Attribute Category'),
        ],
        'columns' => $gridColumnProductAttributeCategory
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
                'attribute' => 'product.name',
                'label' => 'Product'
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
</div>