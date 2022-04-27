<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\widgets\MaskedInput;

?>
<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7(999)999-99-99',
        'clientOptions' => [
            'removeMaskOnSubmit' => true,
        ],
        'options' => [
            'autofocus' => true,
            'placeholder' => '+7(___)___-__-__'
        ]
    ])->label(false) ?>

    <?= Html::submitButton('Оставить заявку', ['class' => 'btn btn-primary-dark']) ?>

<?php ActiveForm::end() ?>
