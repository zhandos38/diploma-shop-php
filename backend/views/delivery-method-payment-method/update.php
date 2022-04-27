<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryMethodPaymentMethod */

$this->title = 'Обновить привязку способа доставки с методам оплаты:  ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Method Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-method-payment-method-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
