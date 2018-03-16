<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $name
 * @property string $address_line_1
 * @property string $postcode
 *
 * @property Room[] $rooms
 */
class Location extends \yii\db\ActiveRecord
{
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
            [['address_line_1', 'postcode'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['address_line_1'], 'string', 'max' => 256],
            [['postcode'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['location_id' => 'id']);
    }
}
