<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;

?>
<div id="login" data-target-group="idForm">
    <!-- Title -->
    <header class="text-center mb-7">
        <h2 class="h4 mb-0"><?= Yii::t('app', 'С возвращением!') ?></h2>
        <p><?= Yii::t('app', 'Войдите чтобы управлять аккаунтом.') ?></p>
    </header>
    <!-- End Title -->

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['site/login'])
    ]) ?>

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

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>

    <div class="d-flex justify-content-end mb-4">
        <a class="js-animation-link small link-muted" href="javascript:;"
           data-target="#forgotPassword"
           data-link-group="idForm"
           data-animation-in="slideInUp"><?= Yii::t('app', 'Забыли пароль?') ?></a>
    </div>

    <div class="mb-2">
        <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover"><?= Yii::t('app', 'Войти') ?></button>
    </div>

    <?php ActiveForm::end() ?>

    <div class="text-center mb-4">
        <span class="small text-muted"><?= Yii::t('app', 'У вас нет аккаунта?') ?></span>
        <a class="js-animation-link small text-dark" href="javascript:;"
           data-target="#signup"
           data-link-group="idForm"
           data-animation-in="slideInUp"><?= Yii::t('app', 'Зарегистрироваться') ?>
        </a>
    </div>

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
        <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="/site/auth?authclient=google" title="Google">
            <span class="fab fa-google mr-1"></span>
            Google
        </a>
    </div>
    <!-- End Login Buttons -->
</div>