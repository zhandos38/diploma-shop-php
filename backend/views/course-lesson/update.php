<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseLesson */

$this->title = 'Обновить лекцию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course Lessons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-lesson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
