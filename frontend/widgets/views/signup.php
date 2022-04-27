<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

?>
<div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
    <!-- Title -->
    <header class="text-center mb-7">
        <h2 class="h4 mb-0"><?= Yii::t('app', 'Добро пожаловать.') ?></h2>
        <p><?= Yii::t('app', 'Заполните форму чтобы зарегистрироваться.') ?></p>
    </header>
    <!-- End Title -->

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['site/signup'])
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Ваше имя'])->label(false) ?>

    <!-- Form Group -->
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
    <!-- End Input -->

    <!-- Form Group -->
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>
    <!-- End Input -->

    <!-- Form Group -->
    <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Повторите пароль'])->label(false) ?>
    <!-- End Input -->

    <div class="mb-2">
        <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover"><?= Yii::t('app', 'Зарегистрироваться') ?></button>
    </div>

    <div class="text-center mb-4">
        <span class="small text-muted"><?= Yii::t('app', 'У вас уже есть аккаунт?') ?></span>
        <a class="js-animation-link small text-dark" href="javascript:;"
           data-target="#login"
           data-link-group="idForm"
           data-animation-in="slideInUp"><?= Yii::t('app', 'Войти') ?>
        </a>
    </div>

    <?php ActiveForm::end() ?>

    <div class="text-center">
        <span class="u-divider u-divider--xs u-divider--text mb-4"><?= Yii::t('app', 'ИЛИ') ?></span>
    </div>

    <!-- Login Buttons -->
    <div class="d-flex">
        <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="/site/auth?authclient=facebook" title="Facebook">
            <span class="fab fa-facebook-square mr-1"></span>
            Facebook
        </a>
        <a class="btn btn-block btn-sm btn-soft-twitter transition-3d-hover ml-1 mt-0" href="/site/auth?authclient=vkontakte" title="Vkontakte">
            <span class="fab fa-vk mr-1"></span>
            Vkontakte
        </a>
    </div>
    <!-- End Login Buttons -->
</div>