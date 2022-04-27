<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mark;

/**
 * MarkSearch represents the model behind the search form of `common\models\Mark`.
 */
class MarkSearch extends Mark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'building_category_id', 'floors', 'built_at', 'building_type_id'], 'integer'],
            [['name', 'address', 'destination'], 'safe'],
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
        $query = Mark::find();

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
            'id' => $this->id,
            'building_category_id' => $this->building_category_id,
            'floors' => $this->floors,
            'built_at' => $this->built_at,
            'building_type_id' => $this->building_type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'destination', $this->destination]);

        return $dataProvider;
    }
}
