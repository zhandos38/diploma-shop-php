<?php


namespace frontend\widgets;


use frontend\models\RecallForm;
use Yii;
use yii\base\Widget;

class RecallWidget extends Widget
{
    public function run()
    {
        $model = new RecallForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->phone = '';
        }

        return $this->render('recall', [
            'model' => $model
        ]);
    }
}