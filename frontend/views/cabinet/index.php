<?php

use common\models\City;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = Yii::t('app', 'Мой профиль');

$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<h1>Мой профиль</h1>
<?php $form = ActiveForm::begin([
    'enableClientScript' => false
]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => '+7(999)999-99-99',
                'clientOptions' => [
                    'removeMaskOnSubmit' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
                'options' => [
                    'id' => 'city-list',
                    'placeholder' => 'Укажите город'
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'address') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'post_code') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-md-12">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary w-100 mb-5']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
