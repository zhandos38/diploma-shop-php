<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Разделы', 'options' => ['class' => 'header']],
                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['user/index']],
                    ['label' => 'Слайдер', 'icon' => 'user', 'url' => ['slider/index']],
                    ['label' => 'Посты', 'icon' => 'newspaper-o', 'url' => ['post/index']],
                    ['label' => 'Категории', 'icon' => 'list', 'url' => ['category/index']],
                    ['label' => 'Товары', 'icon' => 'barcode', 'url' => ['product/index']],
                    ['label' => 'Атрибуты товаров', 'icon' => 'barcode', 'url' => ['product-attribute/index']],
                    ['label' => 'Обзоры товаров', 'icon' => 'star', 'url' => ['review/index']],
                    ['label' => 'Ревизия', 'icon' => 'check', 'url' => ['revision/index']],
                    ['label' => 'Заказы', 'icon' => 'shopping-cart', 'url' => ['order/index']],
                    ['label' => 'Города', 'icon' => 'building-o', 'url' => ['city/index']],
                    ['label' => 'Методы доставки по городам', 'icon' => 'truck', 'url' => ['city-delivery-method/index']],
                    ['label' => 'Связка метода оплаты и метода доставки', 'icon' => 'money', 'url' => ['delivery-method-payment-method/index']],
                    ['label' => 'Способы доставки', 'icon' => 'truck', 'url' => ['delivery-method/index']],
                    ['label' => 'Методы оплаты', 'icon' => 'credit-card', 'url' => ['payment-method/index']],
                    ['label' => 'Отчеты', 'icon' => 'money', 'url' => ['order/report']],
                    ['label' => 'Заявки на обратную связь', 'icon' => 'money', 'url' => ['recall/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
