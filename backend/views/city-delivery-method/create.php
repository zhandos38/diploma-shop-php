<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CityDeliveryMethod */

$this->title = 'Привязка способа доставки к городу';
$this->params['breadcrumbs'][] = ['label' => 'City Delivery Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-delivery-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
