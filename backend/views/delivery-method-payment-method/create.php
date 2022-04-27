<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryMethodPaymentMethod */

$this->title = 'Привезать способа доставки с методам оплаты';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Method Payment Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-method-payment-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
