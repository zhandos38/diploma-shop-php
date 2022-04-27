<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
?>
<!-- Tab Content -->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'layout' => '{items}',
            'options' => [
                'tag' => 'ul',
                'class' => 'row list-unstyled products-group no-gutters',
            ],
            'itemView' => '_item',
            'itemOptions' => [
                'tag' => 'li',
                'class' => 'col-6 col-md-3 col-wd-2gdot4 product-item'
            ]
        ]) ?>
    </div>
</div>