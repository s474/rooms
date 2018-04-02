<?php

namespace common\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property int $room_id
 * @property int $therapist_id
 * @property int $client_id
 * @property int $therapy_id
 * @property int $timestamp
 * @property int $minutes_duration
 *
 * @property Therapy $therapy
 * @property Room $room
 * @property Therapist $therapist
 * @property Client $client
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'therapist_id', 'client_id', 'therapy_id', 'minutes_duration', 'start'], 'required'],
            [['room_id', 'therapist_id', 'client_id', 'therapy_id'], 'integer'],
            [['minutes_duration'], 'string', 'max' => 3],
            //['start', 'validateApptDate', 'skipOnError' => false, 'params'=>['ploppies' => ['smol','medy','llerg']]],
            [['therapy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapy::className(), 'targetAttribute' => ['therapy_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['therapist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapist::className(), 'targetAttribute' => ['therapist_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],                        
        ];
    }
    
    public function validateApptDate($attribute, $params, $validator)
    {
        // Check not overlapping another appointment
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            //$this->addError($attribute, 'oooh!');
        }
        
        // Check opening hours
        
    }

    public function validateRoomTherapy($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, var_export($this->$attribute));
        }
    }

    public function validateTherapistTherapy($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, var_export($this->$attribute));
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room',
            'therapist_id' => 'Therapist',
            'client_id' => 'Client',
            'therapy_id' => 'Therapy',
            'timestamp' => 'Timestamp',
            'minutes_duration' => 'Minutes Duration',
            'start' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapy()
    {
        return $this->hasOne(Therapy::className(), ['id' => 'therapy_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
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
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
    
    
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                //'skipUpdateOnClean' => true,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'end',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'end',
                ],
                'value' => function ($event) {
                    //var_dump($event);
                    //!!! Only need to do this if minutes_duration or start change
                    $end = new \DateTime($event->sender->start);
                    $end->add(new \DateInterval('PT' . $event->sender->minutes_duration . 'M'));
                    $end = $end->format('Y-m-d H:i:s');                    
                    return $end;
                },
            ],
        ];
    }    
    
}
