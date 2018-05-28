<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Appointment[] $appointments
 * @property User $user
 * @property Company $company
 */
class Client extends \common\components\RoomsAR
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
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id'], 'required'],
            [['company_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
    
    public function getName()
    {
        //return $this->user->firstname . ' ' . $this->user->last_name;
        return $this->user->username;
    }    
}
