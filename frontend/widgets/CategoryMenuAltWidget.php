<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class CategoryMenuAltWidget extends Widget
{
    public function run()
    {
        $categories = Category::find()->where(['is_main' => true])->all();

        return $this->render('category-menu-alt', ['categories' => $categories]);
    }
}