<?php


namespace frontend\widgets;


use common\models\WishList;
use Yii;
use yii\base\Widget;

class WishListWidget extends Widget
{
    public function run()
    {
        $qty = 0;
        if (!Yii::$app->user->isGuest) {
            $qty = Yii::$app->user->identity->getWishListCount();
        }

        return $this->render('@frontend/views/user/_wish-list', [
            'qty' => $qty
        ]);
    }
}