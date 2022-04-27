<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryMethod */

$this->title = 'Доавить способ доставки';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-method-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
