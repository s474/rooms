<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "therapy".
 *
 * @property int $id
 * @property string $name
 * @property int $needs_special_room
 *
 * @property RoomSupportsTherapy[] $roomSupportsTherapies
 * @property Appointment[] $appointments
 * @property TherapistDoesTherapy[] $therapistDoesTherapies
 */
class Therapy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'unique'],
            [['name'], 'required'],            
            [['name'], 'string', 'max' => 255],
            [['needs_special_room'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Therapy',
            'needs_special_room' => 'Needs Special Room',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomSupportsTherapies()
    {
        return $this->hasMany(RoomSupportsTherapy::className(), ['therapy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['therapy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapistDoesTherapies()
    {
        return $this->hasMany(TherapistDoesTherapy::className(), ['therapy_id' => 'id']);
    }
}
