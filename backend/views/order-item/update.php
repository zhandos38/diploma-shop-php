<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = 'Обновить товар: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
