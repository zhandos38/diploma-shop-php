<?php

$this->title = Yii::t('app', 'История заказов');

$this->params['breadcrumbs'][] = ['label' => $this->title];

use yii\grid\GridView;
use yii\helpers\Url; ?>
<h1><?= $this->title ?></h1>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'class' => 'table-responsive'
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

//            'id',
        [
            'value' => function($model) {
                return $model->cost;
            },
            'label' => 'Стоймость'
        ],
        [
            'value' => function($model) {
                return $model->getStatus();
            },
            'label' => 'Статус'
        ],
        [
            'attribute' => 'created_at',
            'value' => function($model) {
                return date('d-m-Y H:i', $model->created_at);
            },
            'label' => 'Время добавления'
        ],
        [
            'value' => function($model) {
                return '<a class="btn btn-primary"><i class="fa fa-eye"></i></a>';
            },
            'format' => 'html'
        ]
    ],
]); ?>
