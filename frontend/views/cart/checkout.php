<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Оформление заказа');

$this->params['breadcrumbs'][] = ['label' => $this->title];

use common\models\City;
use common\models\Product;
use common\models\Region;
use kartik\select2\Select2;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class="checkout-area pt-40 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <?php $form = ActiveForm::begin() ?>
                    <div class="checkbox-form">
                        <h3>Детали заказа</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите ваше имя']) ?>
                            </div>
                            <div class="col-md-12">
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
                                    <b>ИЛИ</b>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name'),
                                    'options' => [
                                        'id' => 'region-list',
                                        'placeholder' => 'Укажите регион'
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                                    'data' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'),
                                    'options' => [
                                        'id' => 'city-list',
                                        'placeholder' => 'Укажите город'
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'address')->textInput(['placeholder' => 'Введите адрес (Название улицы, дом, кв)'])->hint('Укажите также название села или населенного пункта, если Вы не нашли свои город в списке') ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'city_delivery_method_id')->dropDownList([], ['id' => 'delivery-method', 'class' => 'form-control form-select', 'prompt' => 'Выберите способ доставки']) ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'post_code')->textInput(['placeholder' => 'Укажите почтовый индекс'])->hint('Поле обязателен, если выбрано способ доставки КазПочта') ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'payment_method_id')->dropDownList([], ['id' => 'payment-method', 'class' => 'form-control form-select', 'prompt' => 'Выберите метод оплаты']) ?>
                            </div>
                            <div id="file-box" class="col-md-12" style="display: none">
                                <?= $form->field($model, 'tempFile')->widget(FileInput::classname(), [
                                    'options' => [
                                        'accept' => 'image/*',
                                    ],
                                    'pluginOptions' => [
                                        'theme' => 'fa',
                                        'showClose' => false,
                                    ]
                                ]) ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'comment')->textarea(['placeholder' => 'Ваши комментарий']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10">
                        <p>
                            Нажимая кнопку «Оформить заказ», я ознокомлен с правилами договора публичной оферты и условиями доставки
                        </p>
                        <div class="order-button-payment">
                            <?= $form->field($model, 'city_id')->hiddenInput(['id' => 'city-id'])->label(false) ?>
                            <button id="checkout-submit" class="btn btn-primary-dark-w" type="submit">Оформить заказ</button>
                        </div>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Ваш заказ</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="cart-product-name">Товар</th>
                                <th class="cart-product-total">Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($session['cart'] as $item): ?>
                                <tr class="cart_item">
                                    <td class="cart-product-name"> <?= $item['name'] ?><strong class="product-quantity"> × <?= $item['qty'] ?></strong></td>
                                    <td class="cart-product-total"><span class="amount"><?= number_format($item['price']) ?></span> ₸</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th><b>Сумма корзины</b></th>
                                <td><span id="cart-sum" class="amount"><?= number_format($session['cart.sum']) ?> ₸</span></td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th><b>Доставка</b></th>
                                <td><span id="delivery-price" class="amount"><?= number_format((float)$session['cart.sum'] * Product::DELIVERY_RATE) ?></span> ₸</td>
                            </tr>
                            <tr class="order-total">
                                <th><b>Итоговая сумма</b></th>
                                <td><b><span id="total-sum"><?= number_format($session['cart.sum']) ?></span> ₸</b></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .form-select {
        padding: .375rem .75rem !important;
        border: 1px solid #dddddd;
    }
</style>
<?php
$js = <<<JS
let fileBox = $('#file-box');
let fileInput = fileBox.find('input');

$(document).ready(function() {
  let cityId = $('#city-list').val();
  if (cityId !== null) {
       setCity(cityId);
  }
});

$('#region-list').on('change', function() {
    resetForm();
    
      $.ajax({
        method: 'get',
        url: '/ru/cart/get-cities',
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
    resetForm();
    setCity($(this).val());
    $('#region-list').val(null);
    $('#city-list').val(null);
    setDefaultCities();
    setDefaultRegions();
});

$('#city-list').on('change', function() {
    resetForm();
    setCity($(this).val());
    $('#main-city-list').val(null);
    setDefaultMainCities();
});

$('#delivery-method').on('change', function() {
    hideFileBox();
    
    $.ajax({
        method: 'get',
        url: '/ru/cart/get-payment-methods',
        data: {id: $(this).val()},
        dataType: 'Json',
        success: function(result) {
          let options = '<option value>Выберите метод оплаты</option>';
          result.forEach(function(item) {
            options += '<option value="' + item.id + '">' + item.name + '</option>'; 
          });
          
          $('#payment-method').html(options);
        },
        error: function() {
          console.log('Ошибка');
        }
    });
});

$('#payment-method').on('change', function() {
    if (parseInt($(this).val()) === 3) {
        showFileBox();
    } else {
        hideFileBox();
    }
});

function showFileBox() {
  fileBox.show('ease');
  fileInput.attr('required', true);
}

function hideFileBox() {
  fileBox.hide('ease');
  fileInput.attr('required', false);
  fileInput.val(null);
}

function setCity(id) {
  setDeliveryMethods(id);
  $('#city-id').val(id);
}

function setDeliveryMethods(id) {
  $.ajax({
    method: 'get',
    url: '/ru/cart/get-delivery-methods-by-city',
    data: {id: id},
    dataType: 'JSON',
    success: result => {
      let options = '<option value>Выберите способ доставки</option>';
      result.forEach(function(item) {
        options += '<option class="delivery-method-item" value="' + item.id + '" data-price="' + item.price + '">' + item.name + ' - ₸' + item.price + '</li>'; 
      });
      
      $('#delivery-method').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
}

function setDefaultRegions() {
  $.ajax({
    method: 'get',
    url: '/ru/cart/get-regions',
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
  $.ajax({
    method: 'get',
    url: '/ru/cart/get-cities',
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
  $.ajax({
    method: 'get',
    url: '/ru/cart/get-main-cities',
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

function calcTotalSum() {
    let deliveryCost = parseFloat($('#delivery-price').html());
    $('#delivery-cost').val(deliveryCost);
    $('#total-sum').html(parseFloat($('#cart-sum').html()) + deliveryCost);
}

function resetForm() {
    $('#delivery-price').html('0');
    calcTotalSum();
    hideFileBox();
}
JS;


$this->registerJs($js);
?>