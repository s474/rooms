<?php
namespace common\components;

use Yii;

class RoomsAR extends \yii\db\ActiveRecord
{	
    
    public static function find()
    {	 
        return parent::find()->where(['company_id' => '4']);   
        //return parent::find()->andFilterWhere(['company_id' => '4']);
    }     
	
}