<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

?>
<!-- ========== FOOTER ========== -->
<footer>
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40"></i>
                            <h2 class="font-size-20 mb-0 ml-3">
                                <?= Yii::t('app', 'У вас остались вопросы? Оставьте заявку на обратный звонок') ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="input-group input-group-pill justify-content-end">
                        <?php Modal::begin([
                            'title' => '<h4>' . Yii::t('app', 'Оставить заявку на обратную связь') . '</h4>',
                            'toggleButton' => ['id' => 'recallBtn', 'class' => 'btn btn-dark btn-sm-wide height-40 py-2', 'label' => Yii::t('app', 'Заказать обратный звонок')],
                        ]); ?>

                        <?= \frontend\widgets\RecallWidget::widget() ?>

                        <?php Modal::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-6">
                        <a href="/" class="d-inline-block">
                            <img src="/images/alipay-logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-light"><?= Yii::t('app', 'Есть вопросы? Позвони нам 24/7!') ?></div>
                                <a href="tel:87770954028" class="font-size-20 text-gray-90">+7(777) 095 40 28</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold"><?= Yii::t('app', 'Наш адрес') ?></h6>
                        <address class="">
                            Самал 2
                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="#">
                                    <span class="fab fa-github btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold"><?= Yii::t('app', 'Информация') ?></h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="<?= Url::to(['site/about']) ?>"><?= Yii::t('app', 'О компании') ?></a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold"><?= Yii::t('app', 'Покупателям') ?></h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="<?= Url::to(['site/delivery']) ?>"><?= Yii::t('app', 'Доставка') ?></a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?= Url::to(['site/payment']) ?>"><?= Yii::t('app', 'Оплата') ?></a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?= Url::to(['site/offer']) ?>"><?= Yii::t('app', 'Публичная оферта') ?></a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
    <!-- Footer-copy-right -->
    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0">© <a href="http://itbgroup.kz" class="font-weight-bold text-gray-90">Веб-студия Itbgroup.kz</a> - All rights Reserved</div>
            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>
<!-- ========== END FOOTER ========== -->
<?= $this->render('_account_sidebar') ?>