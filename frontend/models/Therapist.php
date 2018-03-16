<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "therapist".
 *
 * @property int $id
 * @property string $name
 *
 * @property Session[] $sessions
 * @property TherapistDoesTherapy[] $therapistDoesTherapies
 */
class Therapist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['therapist_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapistDoesTherapies()
    {
        return $this->hasMany(TherapistDoesTherapy::className(), ['therapist_id' => 'id']);
    }
}
