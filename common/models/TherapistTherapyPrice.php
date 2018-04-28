<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "therapist_therapy_price".
 *
 * @property int $id
 * @property int $therapist_id
 * @property int $therapy_price_id
 *
 * @property TherapyPrice $therapyPrice
 * @property Therapist $therapist
 */
class TherapistTherapyPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapist_therapy_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['therapist_id', 'therapy_price_id'], 'required'],
            [['therapist_id', 'therapy_price_id'], 'integer'],
            [['therapy_price_id'], 'exist', 'skipOnError' => true, 'targetClass' => TherapyPrice::className(), 'targetAttribute' => ['therapy_price_id' => 'id']],
            [['therapist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapist::className(), 'targetAttribute' => ['therapist_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'therapist_id' => 'Therapist ID',
            'therapy_price_id' => 'Therapy Price ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapyPrice()
    {
        return $this->hasOne(TherapyPrice::className(), ['id' => 'therapy_price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapist()
    {
        return $this->hasOne(Therapist::className(), ['id' => 'therapist_id']);
    }
}
