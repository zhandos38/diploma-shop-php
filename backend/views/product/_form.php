<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\widgets\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ProductAttributeValue', 
        'relID' => 'product-attribute-value', 
        'value' => \yii\helpers\Json::encode($model->productAttributeValues),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ProductOption', 
        'relID' => 'product-option', 
        'value' => \yii\helpers\Json::encode($model->productOptions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'ProductPrice',
        'relID' => 'product-price',
        'value' => \yii\helpers\Json::encode($model->productPrices),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

$config = [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
            'imagemanager',
        ],
        'imageUpload' => Url::to(['post/image-upload']),
        'imageManagerJson' => Url::to(['post/images-get']),
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
];
?>

<div class="product-form">

    <?php
    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ])
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?php
    $forms = [
        [
            'label' => Html::encode('Информация'),
            'content' => $this->render('_formInformation', [
                'form' => $form,
                'model' => $model,
            ]),
        ],
        [
            'label' =>  Html::encode('Описание (RU)'),
            'content' => $form->field($model, 'description_ru')->widget(Widget::className(), $config),
        ],
        [
            'label' =>  Html::encode('Описание (KZ)'),
            'content' => $form->field($model, 'description_kz')->widget(Widget::className(), $config),
        ],
        [
            'label' =>  Html::encode('Описание (EN)'),
            'content' => $form->field($model, 'description_en')->widget(Widget::className(), $config),
        ],
        [
            'label' =>  Html::encode('Описание (CH)'),
            'content' => $form->field($model, 'description_ch')->widget(Widget::className(), $config),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Характеристики'),
            'content' => $this->render('_formProductAttributeValue', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->productAttributeValues),
            ]),
        ],
//        [
//            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Варианты'),
//            'content' => $this->render('_formProductOption', [
//                'row' => \yii\helpers\ArrayHelper::toArray($model->productOptions),
//            ]),
//        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Ценовая предложение'),
            'content' => $this->render('_formProductPrice', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->productPrices),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end()?>

</div>
