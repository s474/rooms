<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form of `common\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'room_id', 'therapist_id', 'client_id', 'therapy_price_id'], 'integer'],
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
        $query = Appointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['start' => SORT_DESC]]
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
            'therapy_price_id' => $this->therapy_price_id,
        ]);

        //$query->andFilterWhere(['like', 'minutes_duration', $this->minutes_duration]);

        return $dataProvider;
    }
}
