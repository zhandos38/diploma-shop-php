<?php
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $model common\models\Product */
?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'name_ch')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Штрихкод']) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Цена']) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'price_old')->textInput(['maxlength' => true, 'placeholder' => 'Старая цена']) ?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'placeholder' => 'Остаток']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::className(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name_ru')
        ]) ?>
    </div>
    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'short_description_ru')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'short_description_kz')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'short_description_en')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'short_description_ch')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'type')->dropDownList(\common\models\Product::getTypes(), ['prompt' => 'Выберите тип']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'video_url') ?>
    </div>
</div>