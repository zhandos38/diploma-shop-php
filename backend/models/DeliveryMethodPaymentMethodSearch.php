<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeliveryMethodPaymentMethod;

/**
 * DeliveryMethodPaymentMethodSearch represents the model behind the search form of `common\models\DeliveryMethodPaymentMethod`.
 */
class DeliveryMethodPaymentMethodSearch extends DeliveryMethodPaymentMethod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_method_id', 'payment_method_id'], 'integer'],
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
    public function search($params)
    {
        $query = DeliveryMethodPaymentMethod::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'delivery_method_id' => $this->delivery_method_id,
            'payment_method_id' => $this->payment_method_id,
        ]);

        return $dataProvider;
    }
}
