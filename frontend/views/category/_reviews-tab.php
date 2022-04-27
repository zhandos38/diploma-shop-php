<?php
use kartik\rating\StarRating;
use vova07\imperavi\Widget;
use yii\widgets\ActiveForm;

?>
<div class="row mb-8">
    <div class="col-md-6">
        <h3 class="font-size-18 mb-5">Оставить отзыв</h3>
        <div>
            Оценили <?php $reviewsQuantity = count($model->reviews); echo $reviewsQuantity ?> <?= $reviewsQuantity > 1 ? 'раза' : 'раз' ?>
            <div>Средняя оценка: <?= $model->getRating() ?></div>
        </div>
        <!-- Form -->
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php $form = ActiveForm::begin() ?>

            <?= $form->field($reviewForm, 'product_id')->hiddenInput(['value' => $model->id])->label(false) ?>

            <?= $form->field($reviewForm, 'rate')->widget(StarRating::classname(), [
                'pluginOptions' => [
                    'step' => 1,
                    'filledStar' => '<i class="fa fa-star"></i>',
                    'emptyStar' => '<i class="fa fa-star-o"></i>',
                    'showClear' => false
                ]
            ]); ?>

            <?= $form->field($reviewForm, 'comment')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200
                ],
            ]); ?>

            <?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end() ?>
        <?php else: ?>
            <p class="text-danger pt-3">Чтобы оставить отзыв необходимо зарегистрироваться</p>
        <?php endif; ?>
        <!-- End Form -->
    </div>
</div>
<!-- Review -->
<?php if ($model->reviews): ?>
    <?php foreach ($model->reviews as $review): ?>
        <div class="border-bottom border-color-1 pb-4 mb-4">
            <!-- Review Rating -->
            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                    <?php for($i = 0; $i < $review->rate; $i++): ?>
                        <span><i class="fa fa-star"></i></span>
                    <?php endfor; ?>
                </div>
            </div>
            <!-- End Review Rating -->

            <p class="text-gray-90">
                <?= htmlspecialchars_decode($review->comment) ?>
            </p>

            <!-- Reviewer -->
            <div class="mb-2">
                <strong><?= $review->createdBy->name ?></strong>
                <span class="font-size-13 text-gray-23">- <?= $review->created_at ?></span>
            </div>
            <!-- End Reviewer -->
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Обзоров не найдено</p>
<?php endif; ?>