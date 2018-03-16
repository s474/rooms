<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Session;

/**
 * SessionSearch represents the model behind the search form of `frontend\models\Session`.
 */
class SessionSearch extends Session
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'room_id', 'therapist_id', 'client_id', 'therapy_id', 'timestamp'], 'integer'],
            [['minutes_duration'], 'safe'],
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
        $query = Session::find();

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
            'room_id' => $this->room_id,
            'therapist_id' => $this->therapist_id,
            'client_id' => $this->client_id,
            'therapy_id' => $this->therapy_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'minutes_duration', $this->minutes_duration]);

        return $dataProvider;
    }
}
