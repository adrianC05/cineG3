<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actor;

/**
 * ActorSearch represents the model behind the search form of `app\models\Actor`.
 */
class ActorSearch extends Actor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACT_ID', 'SEX_ID'], 'integer'],
            [['ACT_NOMBRE'], 'safe'],
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
        $query = Actor::find();

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
            'ACT_ID' => $this->ACT_ID,
            'SEX_ID' => $this->SEX_ID,
        ]);

        $query->andFilterWhere(['like', 'ACT_NOMBRE', $this->ACT_NOMBRE]);

        return $dataProvider;
    }
}
