<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alquiler;

/**
 * AlquilerSearch represents the model behind the search form of `app\models\Alquiler`.
 */
class AlquilerSearch extends Alquiler
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ALQ_ID', 'SOC_ID', 'PEL_ID'], 'integer'],
            [['ALQ_FECHA_DESDE', 'ALQ_FECHA_HASTA', 'ALQ_FECHA_ENTREGA'], 'safe'],
            [['ALQ_VALOR'], 'number'],
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
        $query = Alquiler::find();

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
            'ALQ_ID' => $this->ALQ_ID,
            'SOC_ID' => $this->SOC_ID,
            'PEL_ID' => $this->PEL_ID,
            'ALQ_FECHA_DESDE' => $this->ALQ_FECHA_DESDE,
            'ALQ_FECHA_HASTA' => $this->ALQ_FECHA_HASTA,
            'ALQ_VALOR' => $this->ALQ_VALOR,
            'ALQ_FECHA_ENTREGA' => $this->ALQ_FECHA_ENTREGA,
        ]);

        return $dataProvider;
    }
}
