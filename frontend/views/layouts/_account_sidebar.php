<!-- Account Sidebar Navigation -->
<aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                <!-- Toggle Button -->
                <div class="d-flex align-items-center pt-4 px-7">
                    <button type="button" class="close ml-auto"
                            aria-controls="sidebarContent"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-unfold-event="click"
                            data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent"
                            data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                        <i class="ec ec-close-remove"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <?= \frontend\widgets\LoginWidget::widget() ?>

                        <!-- Signup -->
                        <?= \frontend\widgets\SignupWidget::widget() ?>

                        <!-- Forgot Password -->
                        <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                            <!-- Title -->
                            <header class="text-center mb-7">
                                <h2 class="h4 mb-0"><?= Yii::t('app', 'Восстановить пароль') ?>.</h2>
                                <p><?= Yii::t('app', 'Введите номер телефона для дальнейшего действия.') ?></p>
                            </header>
                            <!-- End Title -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only" for="recoverEmail">Ваш email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="recoverEmailLabel">
                                                <span class="fas fa-user"></span>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="recoverEmail" placeholder="Your email" aria-label="Your email" aria-describedby="recoverEmailLabel" required
                                               data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="mb-2">
                                <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover"><?= Yii::t('app', 'Восстановить пароль') ?></button>
                            </div>

                            <div class="text-center mb-4">
                                <span class="small text-muted"><?= Yii::t('app', 'Забыли пароль?') ?></span>
                                <a class="js-animation-link small" href="javascript:;"
                                   data-target="#login"
                                   data-link-group="idForm"
                                   data-animation-in="slideInUp"><?= Yii::t('app', 'Войти') ?>
                                </a>
                            </div>
                        </div>
                        <!-- End Forgot Password -->
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
<!-- End Account Sidebar Navigation -->