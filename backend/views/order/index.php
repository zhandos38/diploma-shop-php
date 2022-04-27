<?php

use common\models\CityDeliveryMethod;
use common\models\DeliveryMethod;
use common\models\Order;
use common\models\PaymentMethod;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

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

            'number',
            'name',
            'phone',
            'cost',
            //'customer_id',
            //'address',
            [
                'attribute' => 'city_id',
                'value' => function(Order $model) {
                    return $model->city ? $model->city->name : 'Не указано';
                }
            ],
            //'post_code',
            //'comment:ntext',
            [
                'attribute' => 'status',
                'value' => function(Order $model) {
                    $status = $model->status;

                    if ($status === Order::STATUS_NEW) {
                        $class = "label-info";
                    } elseif ($status === Order::STATUS_PROCESSING) {
                        $class = "label-warning";
                    } elseif ($status === Order::STATUS_FINISHED) {
                        $class = "label-success";
                    }

                    return "<span class='label $class'>" . $model->getStatus() . "</span>";
                },
                'filter' => Order::getStatuses(),
                'format' => 'raw'
            ],
            [
                'attribute' => 'city_delivery_method_id',
                'value' => function(Order $model) {
                    return $model->cityDeliveryMethod ? $model->cityDeliveryMethod->deliveryMethod->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(CityDeliveryMethod::find()->asArray()->all(), 'id', 'name')
            ],
            'delivery_cost',
            [
                'attribute' => 'payment_method_id',
                'value' => function(Order $model) {
                    return $model->paymentMethod ? $model->paymentMethod->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(PaymentMethod::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Order $model) {
                    return date('d-m-Y H:i', $model->created_at);
                }
            ],
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
