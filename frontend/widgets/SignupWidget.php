<?php


namespace frontend\widgets;


use common\models\LoginForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\Widget;

class SignupWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goBack();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}