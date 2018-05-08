<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $address_line_1
 * @property string $postcode
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Company $company
 * @property Room[] $rooms
 */
class Location extends \yii\db\ActiveRecord
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
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'address_line_1', 'postcode', 'name'], 'required'],
            [['company_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address_line_1'], 'string', 'max' => 255],
            [['postcode'], 'string', 'max' => 20],
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
            'name' => 'Location',
            'address_line_1' => 'Address Line 1',
            'postcode' => 'Postcode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['location_id' => 'id']);
    }
}