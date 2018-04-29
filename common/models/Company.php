<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $address_line_1
 * @property string $postcode
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Administrator[] $administrators
 * @property Client[] $clients
 * @property Location[] $locations
 * @property Therapist[] $therapists
 * @property Therapy[] $therapies
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'address_line_1', 'postcode'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address_line_1' => 'Address Line 1',
            'postcode' => 'Postcode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdministrators()
    {
        return $this->hasMany(Administrator::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapists()
    {
        return $this->hasMany(Therapist::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTherapies()
    {
        return $this->hasMany(Therapy::className(), ['company_id' => 'id']);
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }    
}
