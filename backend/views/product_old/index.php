<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'code',
            'price',
            'quantity',
            [
                'attribute' => 'category_id',
                'value' => function(Product $model) {
                    return $model->category->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name')
            ],
            //'img',
            //'description:ntext',
            [
                'attribute' => 'type',
                'value' => function(Product $model) {
                    return $model->getType();
                },
                'filter' => Product::getTypes()
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Product $model) {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                },
                'filter' => false
            ],
            [
                'attribute' => 'updated_at',
                'value' => function(Product $model) {
                    return Yii::$app->formatter->asDatetime($model->updated_at);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
