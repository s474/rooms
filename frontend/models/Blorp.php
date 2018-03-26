<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "blorp".
 *
 * @property int $id
 * @property string $timestamp
 * @property string $datetime
 * @property string $date
 */
class Blorp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blorp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestamp', 'datetime', 'date'], 'safe'],
            [['datetime', 'date'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timestamp' => 'Timestamp',
            'datetime' => 'Datetime',
            'date' => 'Date',
        ];
    }
}
