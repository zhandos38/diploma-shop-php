<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container">
    <div class="site-error pt-60 pb-60">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            <?= Yii::t('app', 'Возникла ошибка, при обработке вашего запроса') ?>
        </p>
        <p>
            <?= Yii::t('app', 'Если вы думаете что это ошибка сервера, пожалуйста сообщите нам.') ?>
        </p>

    </div>

</div>