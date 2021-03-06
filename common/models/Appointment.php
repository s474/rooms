<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;

use Yii;
//use yii\behaviors\AttributeBehavior;
//use yii\db\ActiveRecord;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property int $room_id
 * @property int $therapist_id
 * @property int $client_id
 * @property int $therapy_price_id
 * @property string $start
 * @property string $end
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Room $room
 * @property Therapist $therapist
 * @property Client $client
 * @property TherapyPrice $therapyPrice
 */
class Appointment extends \yii\db\ActiveRecord
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
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {        
        return [
            [['room_id', 'therapist_id', 'client_id', 'therapy_price_id', 'start'], 'required'],
            [['room_id', 'therapist_id', 'client_id', 'therapy_price_id', 'created_at', 'updated_at'], 'integer'],
            [['room_id', 'therapist_id', 'client_id', 'therapy_price_id'], 'filter', 'filter' => 'intval'],
            [['start'], 'validateApptDate'],
            [['therapy_price_id'], 'validateRoomTherapy'],
            [['therapy_price_id'], 'validateTherapistTherapy'],
            [['therapy_price_id'], 'exist', 'skipOnError' => true, 'targetClass' => TherapyPrice::className(), 'targetAttribute' => ['therapy_price_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['therapist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapist::className(), 'targetAttribute' => ['therapist_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],                        
        ];
    }
    
    public function validateApptDate($attribute, $params, $validator)
    {        
        $end = $this->calcEnd();               
                                        
        /* Check not overlapping another Appointment                        
         *         
         *     |        |
         *   --------------     1
         *     |  ----  |       2
         *   -----      |       3
         *     |      -----     4
         *           
         */                         
        $appts = Appointment::find()
            ->where(['and', ['<=', 'start', $this->start], ['>=', 'end', $end]]) // 1
            ->orWhere(['and', ['>=', 'start', $this->start], ['<', 'end', $end]]) // 2
            ->orWhere(['and', ['<', 'start', $this->start], ['>', 'end', $this->start], ['<', 'end', $end]]) // 3
            ->orWhere(['and', ['>=', 'start', $this->start], ['<', 'start', $end], ['>', 'end', $end]]); // 4 
                                                
        // And if Room, Therapist or Client are the same
        $appts->andWhere(['or', 
            ['=','room_id',$this->room_id], 
            ['=', 'therapist_id', $this->therapist_id], 
            ['=', 'client_id', $this->client_id]]);
                
        if (!$this->isNewRecord)
            $appts->andWhere(['!=', 'id', $this->id]);                
        
        $appts = $appts->all();        
        
        $out = '';
        
        foreach ($appts as $appt) {
           $out .= ',,[this:id'.$this->id.'],  start: ' . $this->start . ', end: ' . $end;
           $out .= ', [b]ID:' . $appt->id; 
        }
        
        if ($out != '') {
            $this->addError($attribute, $out);
        } else {
            $this->end = $end;
        }
        // Check opening hours
        
    }

    public function validateRoomTherapy($attribute, $params, $validator)
    {
        if ($this->therapyPrice->therapy->needs_special_room) {
            $roomSupportsTherapy = RoomSupportsTherapy::find()->where(['room_id' => $this->room_id, 'therapy_id' => $this->therapyPrice->therapy_id])->one();
            if (!isset($roomSupportsTherapy))                
                $this->addError($attribute, 'Room is not equipped for this therapy.');
        }        
    }

    public function validateTherapistTherapy($attribute, $params, $validator)
    {
        $therapistDoesTherapy = TherapistDoesTherapy::find()->where(['therapist_id' => $this->therapist_id, 'therapy_id' => $this->therapyPrice->therapy_id])->one();
        if (!isset($therapistDoesTherapy))                
            $this->addError($attribute, 'Therapist does not offer this therapy.');
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
            'therapy_price_id' => 'Therapy',
            'start' => 'Date',
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
    
    public function calcEnd()
    {
        $end = new \DateTime($this->start);
        $end->add(new \DateInterval('PT' . $this->therapyPrice->minutes_duration . 'M'));
        return $end->format('Y-m-d H:i:s'); 
    }
    
    /*
     * 
     * Setting end date with behaviour (this gets done in validation now)
     * 
     * 
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
                    $end = new \DateTime($this->owner->start);
                    $end->add(new \DateInterval('PT' . $this->owner->minutes_duration . 'M'));
                    $end = $end->format('Y-m-d H:i:s');                    
                    return $end;
                },
            ],
        ];
    }    
    */
}
