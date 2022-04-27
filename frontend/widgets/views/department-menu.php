<?php
use yii\helpers\Url;
?>
<ul class="nav navbar-nav departments-menu animate-dropdown">
    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle"><?= Yii::t('app', 'Все категории') ?></a>
        <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown">
            <?php
            /** @var \common\models\Category $categories */
            foreach ($categories as $key => $category): ?>

                <?php if ($category->children): ?>
                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                        <a title="Accessories" data-hover="dropdown" href="index.php?page=product-category" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"><?= $category->name ?></a>
                        <ul role="menu" class=" dropdown-menu">
                            <?php foreach ($category->children as $child): ?>
                                <li class="menu-item animate-dropdown">
                                    <a title="<?= $child->name ?>" href="<?= Url::to(['category/index', 'id' => $child->id]) ?>">
                                        <?= $child->name ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="highlight menu-item animate-dropdown">
                        <a title="<?= $category->name ?>" href="<?= Url::to(['category/index', 'id' => $category->id]) ?>"><?= $category->name ?></a>
                    </li>
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
    </li>
</ul>