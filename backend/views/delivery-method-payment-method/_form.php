<?php

use common\models\DeliveryMethod;
use common\models\PaymentMethod;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DeliveryMethodPaymentMethod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-method-payment-method-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_method_id')->dropDownList(ArrayHelper::map(DeliveryMethod::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите способы оплаты']) ?>

    <?= $form->field($model, 'payment_method_id')->dropDownList(ArrayHelper::map(PaymentMethod::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Выберите метода оплаты']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
