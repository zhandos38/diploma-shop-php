<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\backend\models\ProductAttribute]].
 *
 * @see \backend\models\ProductAttribute
 */
class ProductAttributeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ProductAttribute[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ProductAttribute|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}