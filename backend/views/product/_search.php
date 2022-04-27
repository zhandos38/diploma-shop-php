<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>

    <?= $form->field($model, 'price_in')->textInput(['maxlength' => true, 'placeholder' => 'Price In']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) ?>

    <?php /* echo $form->field($model, 'old_price')->textInput(['maxlength' => true, 'placeholder' => 'Old Price']) */ ?>

    <?php /* echo $form->field($model, 'quantity')->textInput(['maxlength' => true, 'placeholder' => 'Quantity']) */ ?>

    <?php /* echo $form->field($model, 'category_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Category::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'img')->textInput(['maxlength' => true, 'placeholder' => 'Img']) */ ?>

    <?php /* echo $form->field($model, 'description')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'short_description')->textInput(['maxlength' => true, 'placeholder' => 'Short Description']) */ ?>

    <?php /* echo $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'meta_description')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'type')->textInput(['placeholder' => 'Type']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
