<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Owners;

/**
 * OwnersSearch represents the model behind the search form of `backend\models\Owners`.
 */
class OwnersSearch extends Owners
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'plots_id', 'role'], 'integer'],
            [['ownership_share', 'cadastral_square'], 'number'],
            [['psprt_series', 'psprt_given_by', 'phone', 'email', 'cadastral_number'], 'safe'],
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
        $query = Owners::find();

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
            'user_id' => $this->user_id,
            'ownership_share' => $this->ownership_share,
            'cadastral_square' => $this->cadastral_square,
            'plots_id' => $this->plots_id,
            'role' => $this->role,
        ]);

        $query->andFilterWhere(['like', 'psprt_series', $this->psprt_series])
            ->andFilterWhere(['like', 'psprt_given_by', $this->psprt_given_by])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cadastral_number', $this->cadastral_number]);

        return $dataProvider;
    }
}
