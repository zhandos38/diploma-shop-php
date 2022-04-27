<?php

use common\models\DeliveryMethod;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\CityDeliveryMethod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-delivery-method-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Укажите город']) ?>

    <?= $form->field($model, 'delivery_method_id')->dropDownList(ArrayHelper::map(DeliveryMethod::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Укажите способа доставки']) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
