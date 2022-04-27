<?php


namespace frontend\models;


use common\models\Review;
use yii\base\Model;

class ReviewForm extends Model
{
    public $product_id;
    public $rate;
    public $comment;

    public function rules()
    {
        return [
            [['product_id', 'rate'], 'required'],

            [['product_id', 'rate'], 'integer'],
            ['comment', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'rate' => 'Оценка',
            'comment' => 'Комментарий'
        ];
    }

    public function save()
    {
        $review = new Review();
        $review->product_id = $this->product_id;
        $review->rate = $this->rate;
        $review->comment = $this->comment;
        return $review->save();
    }
}