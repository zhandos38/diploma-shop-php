<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\models\City;
use common\models\Region;
use kartik\select2\Select2;use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = Yii::t('app', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup mb-60 mt-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="pb-5"><?= Yii::t('app', 'Регистрация') ?></h1>
                <?php $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'enableClientScript' => false
                ]); ?>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Введите ваше имя']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                            'mask' => '+7(999)999-99-99',
                            'clientOptions' => [
                                'removeMaskOnSubmit' => true
                            ],
                            'options' => [
                                'placeholder' => '7(000) 000-00-00'
                            ]
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите E-mail']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(City::find()->andWhere(['region_id' => null])->asArray()->all(), 'id', 'name'),
                            'options' => [
                                'id' => 'main-city-list',
                                'placeholder' => 'Укажите город'
                            ]
                        ])->label('Города республиканского назначения') ?>
                    </div>
                    <div class="col-md-12">
                        <p class="text-center">
                            <b><?= Yii::t('app', 'Или') ?></b>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
                            'options' => [
                                'id' => 'region-list',
                                'placeholder' => 'Укажите регион'
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
                    <div class="col-md-12">
                        <?= $form->field($model, 'address')->textInput(['placeholder' => 'Введите адрес (улица/село, дом, кв)']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Подтвердите пароль']) ?>
                    </div>
                </div>

                <div class="form-group mb-10">
                    <?= $form->field($model, 'city_id')->hiddenInput(['id' => 'city-id'])->label(false) ?>
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary-dark-w pull-right', 'name' => 'signup-button']) ?>
                    <small>
                        <?= Yii::t('app', 'Нажимая на кнопку «Зарегистрироваться», вы даёте согласия на обработку ваших данных') ?>
                    </small>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$js =<<<JS
$('#region-list').on('change', function() {
      $.get({
        url: '/cart/get-cities',
        data: {id: $(this).val()},
        dataType: 'JSON',
        success: result => {
          let cities = '<option value>Укажите город</option>';
          result.forEach(function(item) {
            cities += '<option value="' + item.id + '">' + item.name + '</option>'; 
          });
         
          $('#city-list').html(cities);
        },
        error: function() {
          console.log('Ошибка');
        }
      });
});

$('#main-city-list').on('change', function() {
    setCity($(this).val());
    $('#region-list').val(null);
    $('#city-list').val(null);
    setDefaultCities();
    setDefaultRegions();
});

$('#city-list').on('change', function() {
    setCity($(this).val());
    $('#main-city-list').val(null);
    setDefaultMainCities();
});

function setCity(id) {
  $('#city-id').val(id);
}

function setDefaultRegions() {
  $.get({
    url: '/cart/get-regions',
    dataType: 'JSON',
    success: result => {
      let options = '<option value>Укажите регион</option>';
      
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#region-list').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
}

function setDefaultCities() {
  $.get({
    url: '/cart/get-cities',
    dataType: 'JSON',
    success: result => {
      let options = '<option value>Укажите город</option>';
      
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#city-list').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
}

function setDefaultMainCities() {
  $.get({
    url: '/cart/get-main-cities',
    dataType: 'JSON',
    success: result => {
      let options = '<option value>Укажите город</option>';
      
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#main-city-list').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
}
JS;

$this->registerJs($js);
?>
