<?php

use common\models\Recall;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на обратную связь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recall-index">

    <?php
    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ])
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'phone',
            [
                'attribute' => 'status',
                'value' => function(Recall $model) {
                    return $model->getStatusLabel();
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Recall $model) {
                    return date('d-m-Y H:i', $model->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end()?>

</div>
