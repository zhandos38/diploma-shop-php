<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::className(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name')
    ]) ?>

    <?php if (!$model->isNewRecord): ?>
        <?php
        $imagesPath = [];
        $imagesId = [];
        foreach ($model->images as $image) {
            $imagesPath[] = $image->getImgPath();
            $imagesId[] = [
                'key' => $image->id
            ];
        }
        ?>

        <?= $form->field($model, 'imageFiles')->widget(FileInput::classname(), [
            'options' => ['multiple' => true, 'accept' => 'image/*', 'name' => 'file-image'],
            'pluginOptions' => [
                'initialPreview' => $imagesPath,
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $imagesId,
                'maxFileCount' => 4,
                'overwriteInitial' => false,
                'deleteUrl' => Url::to(['product/image-delete']),
                'uploadUrl' => Url::to(['product/image-upload', 'id' => $model->id])
            ],
        ]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'description')->widget(Widget::className(), [
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
    ]); ?>

    <?= $form->field($model, 'type')->dropDownList(\common\models\Product::getTypes(), ['prompt' => 'Выберите тип']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
