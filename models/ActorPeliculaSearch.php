<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActorPelicula;

/**
 * ActorPeliculaSearch represents the model behind the search form of `app\models\ActorPelicula`.
 */
class ActorPeliculaSearch extends ActorPelicula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['APL_ID', 'ACT_ID', 'PEL_ID'], 'integer'],
            [['APL_PAPEL'], 'safe'],
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
        $query = ActorPelicula::find();

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
            'APL_ID' => $this->APL_ID,
            'ACT_ID' => $this->ACT_ID,
            'PEL_ID' => $this->PEL_ID,
        ]);

        $query->andFilterWhere(['like', 'APL_PAPEL', $this->APL_PAPEL]);

        return $dataProvider;
    }
}
