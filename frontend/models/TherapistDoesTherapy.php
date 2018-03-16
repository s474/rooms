<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "therapist_does_therapy".
 *
 * @property int $id
 * @property int $therapist_id
 * @property int $therapy_id
 *
 * @property Therapist $therapist
 * @property Therapy $therapy
 */
class TherapistDoesTherapy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapist_does_therapy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['therapist_id', 'therapy_id'], 'required'],
            [['therapist_id', 'therapy_id'], 'integer'],
            [['therapist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapist::className(), 'targetAttribute' => ['therapist_id' => 'id']],
            [['therapy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapy::className(), 'targetAttribute' => ['therapy_id' => 'id']],
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
            'therapy_id' => 'Therapy ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapist()
    {
        return $this->hasOne(Therapist::className(), ['id' => 'therapist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapy()
    {
        return $this->hasOne(Therapy::className(), ['id' => 'therapy_id']);
    }
}
