<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii2mod\alert\Alert;

AppAsset::register($this);

$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="page">
    <?= $this->render('_header_alt') ?>
    <div id="content" class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'tag' => 'ol',
                        'itemTemplate' => '<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">{link}</li>',
                        'activeItemTemplate' => '<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{link}</li>',
                        'options' => [
                            'class' => 'breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble'
                        ]
                    ]) ?>
                </nav>
            </div>
        </div>

        <?= Alert::widget() ?>

        <div class="container mb-10">
            <div class="row pt-40 pb-40">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="<?= Url::to(['cabinet/index']) ?>" class="list-group-item list-group-item-action <?= $action === 'index' ? 'active' : null ?>">
                            <i class="fa fa-user"></i> Мой профиль
                        </a>
                        <a href="<?= Url::to(['cabinet/orders']) ?>" class="list-group-item list-group-item-action <?= $action === 'orders' ? 'active' : null ?>">
                            <i class="fa fa-shopping-cart"></i> История заказов
                        </a>
                        <a href="<?= Url::to(['cabinet/wish-list']) ?>" class="list-group-item list-group-item-action <?= $action === 'wish-list' ? 'active' : null ?>">
                            <i class="fa fa-heart"></i> Список желаемых товаров
                        </a>
                        <a href="<?= Url::to(['cabinet/logout']) ?>" class="list-group-item list-group-item-action" data-method="post">
                            <i class="fa fa-sign-out"></i> Выйти
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?= $content ?>
                </div>
            </div>
        </div>

    </div>
</div>


<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
