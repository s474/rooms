<?php

namespace common\models;

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
            [['room_id', 'therapist_id', 'client_id', 'therapy_id', 'minutes_duration'], 'integer'],
            [['room_id', 'therapist_id', 'client_id', 'therapy_id', 'minutes_duration'], 'filter', 'filter' => 'intval'],
            [['start'], 'validateApptDate'],
            [['therapy_id'], 'validateRoomTherapy'],
            [['therapy_id'], 'validateTherapistTherapy'],
            [['therapy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Therapy::className(), 'targetAttribute' => ['therapy_id' => 'id']],
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
        $appts->andWhere(['or', ['=','room_id',$this->room_id], ['=', 'therapist_id', $this->therapist_id], ['=', 'client_id', $this->client_id]]);
                
        if (!$this->isNewRecord)
            $appts->andWhere(['!=', 'id', $this->id]);                
        
        $appts = $appts->all();        
        
        $out = '';
        
        foreach ($appts as $appt) {
           $out .= ',,[this:id'.$this->id.'],  start: ' . $this->start . ', end: ' . $end;
           $out .= ', [b]ID:' . $appt->id; 
        }
        
        if ($out != '')
            $this->addError($attribute, $out);
                                                                        
        // Check opening hours
        
    }

    public function validateRoomTherapy($attribute, $params, $validator)
    {
        if ($this->therapy->needs_special_room) {
            $roomSupportsTherapy = RoomSupportsTherapy::find()->where(['room_id' => $this->room_id, 'therapy_id' => $this->therapy_id])->one();
            if (!isset($roomSupportsTherapy))                
                $this->addError($attribute, 'Room is not equipped for this therapy.');
        }        
    }

    public function validateTherapistTherapy($attribute, $params, $validator)
    {
        $therapistDoesTherapy = TherapistDoesTherapy::find()->where(['therapist_id' => $this->therapist_id, 'therapy_id' => $this->therapy_id])->one();
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
    
    /*
    public function beforeSave()
    {
        echo '<br /><br />before this->getDirtyAttributes:';
        var_dump($this->getDirtyAttributes());               
    }  
    */
    
    public function afterSave($insert, $changedAttributes)
    {
        if($insert || (isset($changedAttributes['minutes_duration']) || isset($changedAttributes['start']))) {                            
            $this->end = $this->calcEnd(); 
            $this->save();            
        }
        
        parent::afterSave($insert, $changedAttributes);
    }    
    
    public function calcEnd()
    {
        $end = new \DateTime($this->start);
        $end->add(new \DateInterval('PT' . $this->minutes_duration . 'M'));
        return $end->format('Y-m-d H:i:s'); 
    }
    
    /*
     * 
     * Setting end date with behaviour rather than afterSave
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
