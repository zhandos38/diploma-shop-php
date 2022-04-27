<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii2mod\alert\Alert;

AppAsset::register($this);
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
<body class="<?= Yii::$app->controller->action->id === 'product' ? 'single-product full-width' : '' ?>">
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

        <div class="container">
            <?= $content ?>
        </div>

    </div>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
