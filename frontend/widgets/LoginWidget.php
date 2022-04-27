<?php


namespace frontend\widgets;


use common\models\LoginForm;
use Yii;
use yii\base\Widget;

class LoginWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }
}