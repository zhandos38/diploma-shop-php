<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recall */

$this->title = 'Create Recall';
$this->params['breadcrumbs'][] = ['label' => 'Recalls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
