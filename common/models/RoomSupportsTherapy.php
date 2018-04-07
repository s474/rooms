<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_supports_therapy".
 *
 * @property int $id
 * @property int $room_id
 * @property int $therapy_id
 *
 * @property Room $room
 * @property Therapy $therapy
 */
class RoomSupportsTherapy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_supports_therapy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'therapy_id'], 'required'],
            [['room_id', 'therapy_id'], 'integer'],            
            [['therapy_id'], 'unique', 'targetAttribute' => ['room_id', 'therapy_id'], 'message' => 'Room already supports this therapy.'],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
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
            'room_id' => 'Room',
            'therapy_id' => 'Therapy',
        ];
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
    public function getTherapy()
    {
        return $this->hasOne(Therapy::className(), ['id' => 'therapy_id']);
    }
}
