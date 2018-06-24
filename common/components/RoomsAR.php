<?php
namespace common\components;

use Yii;

class RoomsAR extends \yii\db\ActiveRecord
{	

    public static function find($skipCompany = false, $join = false)
    {
        if ($skipCompany) {
            return parent::find();
        } else {    
            $t = '';
            if ($join)
                $t = $join . '.company_id';
            else 
                $t = 'company_id';
            return parent::find()->andFilterWhere([$t => Yii::$app->session->get('company_id')]);
        }
    }         

}
