<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TherapyPrice;

/**
 * TherapyPriceSearch represents the model behind the search form of `common\models\TherapyPrice`.
 */
class TherapyPriceSearch extends TherapyPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'therapy_id', 'minutes_duration'], 'integer'],
            [['description'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TherapyPrice::find();

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
            'therapy_id' => $this->therapy_id,
            'minutes_duration' => $this->minutes_duration,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
