<?php
/**
 * @var $order \common\models\Order
 * */
?>
<div style="font-family: 'Arial'; font-size:12px;">
    <div style="font-size: 16px; font-weight: bold; text-align: center">
        Bigline.kz
    </div>
    <hr>
    <div style="font-size: 10px;">
        Дата и время: <?= date('Y-m-d H:i', $order->created_at) ?> <br>
    </div>
    <hr>
    <?php foreach ($order->orderItems as $item): ?>
    <div><?= $item->product_name ?></div><div><?= $item->quantity ?> X <?= $item->cost ?> = <?= $item->quantity * $item->cost ?></div>
    <?php endforeach; ?>
    <hr>
    Сумма:  <?= $order->cost ?> <br>
    Стоимость доставки:  <?= $order->delivery_cost ?> <br>
    <hr>
    <b>ИТОГО: <?= $order->cost + $order->delivery_cost ?></b>
    <hr>
    <div style="text-align: center;">
        <div style="font-size: 10px">
            Спасибо за покупку!
        </div>
    </div>
</div>
