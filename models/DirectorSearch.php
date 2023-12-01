<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Director;

/**
 * DirectorSearch represents the model behind the search form of `app\models\Director`.
 */
class DirectorSearch extends Director
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DIR_ID'], 'integer'],
            [['DIR_NOMBRE'], 'safe'],
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
        $query = Director::find();

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
            'DIR_ID' => $this->DIR_ID,
        ]);

        $query->andFilterWhere(['like', 'DIR_NOMBRE', $this->DIR_NOMBRE]);

        return $dataProvider;
    }
}
