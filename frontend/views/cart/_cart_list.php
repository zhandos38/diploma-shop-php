<?php if (!empty($session['cart'])): ?>
    <?php foreach ($session['cart'] as $item): ?>
        <li class="border-bottom pb-3 mb-3">
            <div class="">
                <ul class="list-unstyled row mx-n2">
                    <li class="px-2 col-auto">
                        <img class="img-fluid cart-item-img" src="<?= $item['img'] ?>" alt="img">
                    </li>
                    <li class="px-2 col">
                        <h5 class="text-blue font-size-14 font-weight-bold">
                            <?= $item['name'] ?>
                        </h5>
                        <span class="font-size-14"><?= $item['qty'] ?> × ₸<?= $item['price'] ?></span>
                    </li>
                    <li class="px-2 col-auto">
                        <a href="#" class="text-gray-90 remove" data-id="<?= $item['id'] ?>"><i class="ec ec-close-remove"></i></a>
                    </li>
                </ul>
            </div>
        </li>
    <?php endforeach; ?>
<?php else: ?>
    <li  class="text-center">
        Ваша корзина пуста
    </li>
<?php endif; ?>