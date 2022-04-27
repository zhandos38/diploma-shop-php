<?php
$this->title = Yii::t('app', 'Контакты');

$this->params['breadcrumbs'][] = ['label' => 'Контакты'];
?>
<div class="about-us-wrapper mb-10">
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-4">
                    <p><b>Адрес:</b></p>
                </div>
                <div class="col-8">
                    <p>
                        г. Шымкент, Самал 2
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p><b>Телефоны:</b></p>
                </div>
                <div class="col-8">
                    <p><a href="tel:87770954028">+7(777) 095 40 28</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>
                        <b>E-mail:</b>
                    </p>
                </div>
                <div class="col-8">
                    <p>
                        info@alipay.kz
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>
                        <b>Режим работы:</b>
                    </p>
                </div>
                <div class="col-8">
                    <p>
                        ПН-ПТ, с 09:00 до 18:00
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="contacts-map">
                <div class="map-item">
                    <div class="map-wrapper" style="min-height: 235px">
                        <div class="map">
                            <iframe src="https://yandex.com/map-widget/v1/?um=constructor%3Ab9abcbde1f5cb7bae9cf06fe65b9f159c681da24331dbab1fad47c39fbba1a4f&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
