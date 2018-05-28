<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "therapy".
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property int $needs_special_room
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RoomSupportsTherapy[] $roomSupportsTherapies
 * @property TherapistDoesTherapy[] $therapistDoesTherapies
 * @property Company $company
 * @property TherapyPrice[] $therapyPrices
 */
class Therapy extends \common\components\RoomsAR
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
        return 'therapy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'name'], 'required'],
            [['company_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['needs_special_room'], 'string', 'max' => 1],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'name' => 'Name',
            'needs_special_room' => 'Needs Special Room',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
    public function getTherapistDoesTherapies()
    {
        return $this->hasMany(TherapistDoesTherapy::className(), ['therapy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapyPrices()
    {
        return $this->hasMany(TherapyPrice::className(), ['therapy_id' => 'id']);
    }
}