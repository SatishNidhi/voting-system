<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductEnquiry;

/**
 * ProductEnquirySearch represents the model behind the search form of `common\models\ProductEnquiry`.
 */
class ProductEnquirySearch extends ProductEnquiry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enquiry_id', 'phone'], 'integer'],
            [['name', 'product', 'email', 'enquiry_content', 'date'], 'safe'],
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
        $query = ProductEnquiry::find();

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
            'enquiry_id' => $this->enquiry_id,
            'phone' => $this->phone,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'enquiry_content', $this->enquiry_content]);

        return $dataProvider;
    }
}
