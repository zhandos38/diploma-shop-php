<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseLesson */

$this->title = 'Создать лекцию';
$this->params['breadcrumbs'][] = ['label' => 'Создать лекцию', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-lesson-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
