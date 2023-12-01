<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelicula;

/**
 * PeliculaSearch represents the model behind the search form of `app\models\Pelicula`.
 */
class PeliculaSearch extends Pelicula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PEL_ID', 'GEN_ID', 'DIR_ID', 'FOR_ID'], 'integer'],
            [['PEL_NOMBRE', 'PEL_FECHA_ESTRENO'], 'safe'],
            [['PEL_COSTO'], 'number'],
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
        $query = Pelicula::find();

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
            'PEL_ID' => $this->PEL_ID,
            'GEN_ID' => $this->GEN_ID,
            'DIR_ID' => $this->DIR_ID,
            'FOR_ID' => $this->FOR_ID,
            'PEL_COSTO' => $this->PEL_COSTO,
            'PEL_FECHA_ESTRENO' => $this->PEL_FECHA_ESTRENO,
        ]);

        $query->andFilterWhere(['like', 'PEL_NOMBRE', $this->PEL_NOMBRE]);

        return $dataProvider;
    }
}
