<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $location_id
 * @property int $name
 *
 * @property Location $location
 * @property RoomSupportsTherapy[] $roomSupportsTherapies
 * @property Appointment[] $appointments
 */
class Room extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_id', 'name', 'colour'], 'required'],
            [['location_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['colour'], 'string', 'max' => 7],
            [['name'], 'unique', 'targetAttribute' => ['name', 'location_id'], 'message' => 'Name must be unique for location.'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location_id' => 'Location',
            'name' => 'Room',
            'colour' => 'Colour',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomSupportsTherapies()
    {
        return $this->hasMany(RoomSupportsTherapy::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['room_id' => 'id']);
    }
}
