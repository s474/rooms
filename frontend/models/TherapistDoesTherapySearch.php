<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TherapistDoesTherapy;

/**
 * TherapistDoesTherapySearch represents the model behind the search form of `app\models\TherapistDoesTherapy`.
 */
class TherapistDoesTherapySearch extends TherapistDoesTherapy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'therapist_id', 'therapy_id'], 'integer'],
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
        $query = TherapistDoesTherapy::find();

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
            'therapist_id' => $this->therapist_id,
            'therapy_id' => $this->therapy_id,
        ]);

        return $dataProvider;
    }
}
