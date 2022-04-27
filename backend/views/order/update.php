<?php

use common\models\OrderItem;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = 'Заказ #' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';

$tab = Yii::$app->request->get('tab');
?>
<div class="order-update">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <ul class="nav nav-tabs">
        <li class="<?= $tab === 'order' || $tab === null ? 'active' : '' ?>"><a data-toggle="tab" href="#order">Информация о заказе</a></li>
        <li class="<?= $tab === 'order-detail' ? 'active' : '' ?>"><a data-toggle="tab" href="#order-detail">Детали заказа</a></li>
    </ul>

    <div class="tab-content">
        <div id="order" class="tab-pane fade <?= $tab === 'order' || $tab === null ? 'in active' : '' ?>">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <div id="order-detail" class="tab-pane fade <?= $tab === 'order-detail' ? 'in active' : '' ?>">

            <?= Html::a('<i class="fa fa-plus"></i> Добавить товар', ['order-item/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>Штрихкод</th>
                            <th>Найменование</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Сумма</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model->orderItems as $item): ?>
                            <tr>
                                <td><?= !empty($item->product->code) ? $item->product->code : 'Не указано' ?></td>
                                <td><?= $item->product_name ?></td>
                                <td><?= $item->quantity ?></td>
                                <td><?= $item->cost ?></td>
                                <td><?= $item->quantity * $item->cost ?></td>
                                <td>
                                    <?= Html::a('<i class="fa fa-trash-o"></i>', ['order-item/delete', 'id' => $item->id], ['class' => 'btn btn-danger', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?', 'data-method' => 'post']) ?>
                                    <?= Html::a('<i class="fa fa-eye"></i>', ['order-item/update', 'id' => $item->id], ['class' => 'btn btn-primary']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <?php LteBox::end() ?>

</div>
