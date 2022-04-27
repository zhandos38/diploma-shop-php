<?php


namespace frontend\models;


use common\models\Recall;
use yii\base\Model;
use yii\db\Exception;
use yii\helpers\VarDumper;

class RecallForm extends Model
{
    public $phone;

    public function rules()
    {
        return [
            ['phone', 'string', 'max' => 20]
        ];
    }

    public function save()
    {
        $model = new Recall();
        $model->phone = $this->phone;
        $model->created_at = time();
        if (!$model->save()) {
            throw new Exception('Возникла ошибка при отправке обратной связи');
        }

        return true;
    }
}