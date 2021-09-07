<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vote;

/**
 * VoteSearch represents the model behind the search form of `common\models\Vote`.
 */
class VoteSearch extends Vote
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vote_id', 'delicate_id', 'candidate_id'], 'integer'],
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
        $query = Vote::find();

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
            'vote_id' => $this->vote_id,
            'delicate_id' => $this->delicate_id,
            'candidate_id' => $this->candidate_id,
        ]);

        return $dataProvider;
    }
}
