<?php


namespace frontend\models;


use common\models\Category;
use common\models\Product;
use common\models\ProductAttributeValue;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class ProductSearch extends Product
{
    public $price_min;
    public $price_max;

    public $sort;

    public $attributes;

    public $id;
    public $categoryIds;

    public function formName()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['price_min', 'price_max', 'attributes', 'sort'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $childIds)
    {
        $query = Product::find()
                ->alias('t1')
                ->andFilterWhere([
                'in',
                't1.category_id',
                $childIds
            ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->price_min && $this->price_max) {
            $query->andWhere(['between', 't1.price', $this->price_min, $this->price_max]);
        }

        if ($this->price_min && !$this->price_max) {
            $query->andWhere(['>=', 't1.price', $this->price_min]);
        }

        if (!$this->price_min && $this->price_max) {
            $query->andWhere(['<=', 't1.price', $this->price_max]);
        }

        if ($this->sort === 'newest') {
            $query->orderBy(['created_at' => SORT_DESC]);
        }

        if ($this->sort === 'cheap') {
            $query->orderBy(['price' => SORT_ASC]);
        }

        if ($this->sort === 'expensive') {
            $query->orderBy(['price' => SORT_DESC]);
        }

        $productIdsMerged = [];
        if ($this->attributes) {
            $attributes = explode('|', $this->attributes);
            foreach ($attributes as $attribute) {
                $productIds = [];
                $attributeItems = explode(',', $attribute);
                foreach ($attributeItems as $item) {
                    $ids = ProductAttributeValue::find()
                        ->joinWith('product as t2')
                        ->andWhere(['t2.category_id' => $this->id])
                        ->andWhere(['value' => $item])
                        ->select('product_id')
                        ->column();

                    $productIds = array_merge($productIds, $ids);
                }

                $productIdsMerged = $productIdsMerged ? array_intersect($productIdsMerged, $productIds) : $productIds;

                if (empty($productIdsMerged)) {
                    break;
                }
            }

            $query->andWhere(['t1.id' => $productIdsMerged]);
        }

        return $dataProvider;
    }
}