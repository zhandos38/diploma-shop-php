<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = Yii::t('app', 'Авторизация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login mb-60 mt-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h1 class="pb-5"><?= Yii::t('app', 'Авторизация') ?></h1>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableClientScript' => false
                ]); ?>

                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                    'options' => [
                        'autofocus' => true
                    ]
                ]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'check-box d-inline-block']) ?>

                <div style="color:#999;margin:1em 0; display: flex; justify-content: space-between">
                    <div>
                        <?= Html::a(Yii::t('app', 'Забыли пароль?'), ['site/request-password-reset']) ?>
                    </div>
                    <div>
                        <?= Html::a(Yii::t('app', 'Переотправить письмо для подтверждение'), ['site/resend-verification-email']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-block btn-primary-dark-w']) ?>
                </div>

                <!-- Login Buttons -->
                <div class="d-flex pb-10">
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

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>