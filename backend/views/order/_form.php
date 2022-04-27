<?php

use common\models\City;
use common\models\DeliveryMethod;
use common\models\Order;
use common\models\OrderItem;
use common\models\PaymentMethod;
use common\models\User;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'city_delivery_method_id')->dropDownList(ArrayHelper::map(DeliveryMethod::find()->asArray()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'delivery_cost')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'payment_method_id')->dropDownList(ArrayHelper::map(PaymentMethod::find()->asArray()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList(Order::getStatuses()) ?>
            <?= $form->field($model, 'pay_status')->dropDownList(Order::getPayStatuses()) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-4">

            <?= coderius\lightbox2\Lightbox2::widget([
                'clientOptions' => [
                    'resizeDuration' => 200,
                    'wrapAround' => true,
                ]
            ]) ?>

            <a href="<?= $model->getImage() ?>" data-lightbox="roadtrip" data-title="check" data-alt="check">
                <!-- Thumbnail picture -->
                <?= Html::img($model->getImage()) ?>
            </a>
        </div>
    </div>

    <h4>
        <b>Информация о клиенте</b>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'customer_id')->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
                'options' => [
                    'id' => 'city-list',
                    'placeholder' => 'Укажите город'
                ]
            ])->label('Город') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
