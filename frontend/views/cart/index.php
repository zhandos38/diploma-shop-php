<?php
use yii\helpers\Url;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Корзина');
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?= $this->render('_view', [
            'session' => $session
        ]) ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
$js =<<<JS
$('body').on('click', '.remove', function() {
  $.ajax({
    url: '/ru/cart/update',
    method: 'get',
    data: {id: $(this).data('id')},
    success: function(result) {
      $('#main').html(result);
    },
    error: function() {
      console.log('Cart updated error');
    }
  });
});
JS;

$this->registerJs($js);
?>