<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "therapy_price".
 *
 * @property int $id
 * @property int $therapy_id
 * @property int $minutes_duration
 * @property string $description
 * @property string $price
 *
 * @property Appointment[] $appointments
 * @property Therapy $therapy
 */
class TherapyPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'therapy_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['therapy_id', 'minutes_duration', 'description', 'price'], 'required'],
            [['therapy_id', 'minutes_duration'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string', 'max' => 255],
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
            'therapy_id' => 'Therapy ID',
            'minutes_duration' => 'Minutes Duration',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['therapy_price_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapy()
    {
        return $this->hasOne(Therapy::className(), ['id' => 'therapy_id']);
    }
}
