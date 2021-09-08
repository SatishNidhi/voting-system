<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Delicate;

/**
 * DelicateSearch represents the model behind the search form of `common\models\Delicate`.
 */
class DelicateSearch extends Delicate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delicate_id', 'ncc_id', 'recommender_id'], 'integer'],
            [['name', 'email', 'phone', 'photo', 'political_background', 'remarks', 'created_at'], 'safe'],
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
        $query = Delicate::find();

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
            'delicate_id' => $this->delicate_id,
            'ncc_id' => $this->ncc_id,
            'created_at' => $this->created_at,
            'recommender_id' => $this->recommender_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'political_background', $this->political_background])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }

    public function searchVoter($params)
    {
        $candidate_id = $params['id'];
        $query = Delicate::find()
                    ->joinWith('votes')
                    ->where(['candidate_id'=>$candidate_id])
                    ;
        // echo '<pre>';
        // print_r($query->all());
        // die;

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
            'delicate_id' => $this->delicate_id,
            'ncc_id' => $this->ncc_id,
            'created_at' => $this->created_at,
            'recommender_id' => $this->recommender_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'political_background', $this->political_background])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
