<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reestr;

/**
 * ReestrSearch represents the model behind the search form of `backend\models\Reestr`.
 */
class ReestrSearch extends Reestr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'plots_id'], 'integer'],
            [['cadastral_square', 'ownership_share'], 'number'],
            [['cadastral_number', 'psprt_series', 'psprt_given_by'], 'safe'],
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
        $query = Reestr::find();

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
            'plots_id' => $this->plots_id,
            'cadastral_square' => $this->cadastral_square,
            'ownership_share' => $this->ownership_share,
        ]);

        $query->andFilterWhere(['like', 'cadastral_number', $this->cadastral_number])
            ->andFilterWhere(['like', 'psprt_series', $this->psprt_series])
            ->andFilterWhere(['like', 'psprt_given_by', $this->psprt_given_by]);

        return $dataProvider;
    }
}
