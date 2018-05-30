<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "administrator".
 *
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property string $colour
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 * @property Company $company
 */
class Administrator extends \common\components\RoomsAR
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        if($insert && !isset($this->user_id)) { 
            
            //No user ID set - create a user
            //echo '!*!*!*!*!*! !create user here';
            //$this->end = $this->calcEnd(); 
            //$this->save();            
        }

        parent::afterSave($insert, $changedAttributes);
    }    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'administrator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id'], 'required'],
            [['company_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['colour'], 'string', 'max' => 7],
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
            'company_id' => 'Company',
            'user_id' => 'User',
            'colour' => 'Colour',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
