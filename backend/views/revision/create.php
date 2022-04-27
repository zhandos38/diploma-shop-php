<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\RevisionAsset;
RevisionAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Revision */

$this->title = 'Сделать ревизию';
$this->params['breadcrumbs'][] = ['label' => 'Ревизия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php LteBox::begin([
    'type' => LteConst::TYPE_SUCCESS,
    'isSolid' => true,
    'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
    'tooltip' => 'this tooltip description',
    'title' =>  $this->title
]) ?>

<div id="revision-create-app">
    <div class="app-container">
        <h2>Ревизия</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="product-barcode">Штрихкод</label>
                    <autocomplete
                            id="product-barcode"
                            :search="searchProductByBarcode"
                            :get-result-value="getResultValueBarcode"
                            @submit="setProduct"
                            :debounce-time="500"
                            auto-select
                    >
                    </autocomplete>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group" style="position: relative">
                    <label for="product-name">Наименование товара</label>
                    <autocomplete
                            id="product-name"
                            :search="searchProductByName"
                            :get-result-value="getResultValueName"
                            @submit="setProduct"
                            :debounce-time="500"
                    >
                    </autocomplete>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Штрихкод</th>
                <th>Наименование товара</th>
                <th>Фактический остаток</th>
                <th>Остаток</th>
                <th>Разница</th>
                <th>Закупочная цена</th>
                <th>Процент</th>
                <th>Розничная цена</th>
                <th>Сумма потерь</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(product, index) in products" v-bind:key="product.id">
                <td>{{ product.code }}</td>
                <td>{{ product.name }}</td>
                <td>
                    <input class="form-control" type="number" v-model="product.currentQty">
                </td>
                <td>{{ product.quantity }}</td>
                <td
                        :class="{
                'text-danger':
                  (product.diff =
                    parseFloat(product.currentQty) -
                    parseFloat(product.quantity)) < 0,
                'text-success': product.diff > 0
              }"
                >
                    {{ product.diff }}
                </td>
                <td>{{ product.price_in }}</td>
                <td>
                    {{
                    Math.abs(
                    (product.price_in / product.price_retail - 1) * 100
                    ).toFixed(2)
                    }}%
                </td>
                <td>{{ product.price_retail }}</td>
                <td
                        :class="{
                'text-danger':
                  (product.diffAmount =
                    product.diff * parseFloat(product.price_retail)) < 0,
                'text-success': product.diffAmount > 0
              }"
                >
                    {{ product.diffAmount }}
                </td>
                <td
                        @click="deleteProduct(index)"
                        class="btn btn-danger"
                        data-target="tooltip"
                        title="Удалить товар"
                >
                    <i class="glyphicon glyphicon-trash"></i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ totalDiffAmount }}</td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-success" @click="save">
            Сохранить
        </button>
    </div>
</div>
<?php LteBox::end() ?>