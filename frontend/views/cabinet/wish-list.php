<?php
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Список желаемых товаров');

$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<h1><?= $this->title ?></h1>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'layout' => '{items}',
    'options' => [
        'tag' => 'ul',
        'class' => 'products columns-4',
    ],
    'itemView' => '_product',
    'itemOptions' => [
        'tag' => 'li',
        'class' => 'product'
    ]
]) ?>
