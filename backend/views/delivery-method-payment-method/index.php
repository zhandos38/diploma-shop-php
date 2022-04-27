<?php

use common\models\DeliveryMethod;
use common\models\DeliveryMethodPaymentMethod;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeliveryMethodPaymentMethodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Привязка способа доставки с методам оплаты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-method-payment-method-index">

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

            [
                'attribute' => 'delivery_method_id',
                'value' => function(DeliveryMethodPaymentMethod $model) {
                    return $model->deliveryMethod->name;
                },
                'filter' => ArrayHelper::map(DeliveryMethod::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'payment_method_id',
                'value' => function(DeliveryMethodPaymentMethod $model) {
                    return $model->paymentMethod->name;
                },
                'filter' => ArrayHelper::map(DeliveryMethod::find()->asArray()->all(), 'id', 'name')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
