<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityDeliveryMethod */

$this->title = 'Обновить способ доставки для города: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'City Delivery Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-delivery-method-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
