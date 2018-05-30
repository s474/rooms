<?php
namespace common\components;

use Yii;

class RoomsAR extends \yii\db\ActiveRecord
{	
    
    public static function find()
    {	
        $session = Yii::$app->session;
        return parent::find()->andFilterWhere(['company_id' => $session['company_id']]);
        
        
        //return parent::find()->andFilterWhere(['company_id' => $_SESSION['company_id']]);
    }     
    
}