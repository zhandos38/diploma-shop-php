<?php

use common\models\Course;
use common\models\CourseLesson;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CourseLessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Лекции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-lesson-index">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Создать <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ])

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            [
                'attribute' => 'course_id',
                'value' => function(CourseLesson $model) {
                    return $model->course->name;
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function(CourseLesson $model) {
                    return date('d-m-Y H:i', $model->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
