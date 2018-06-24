<?php
namespace common\components;

use Yii;

class RoomsAR extends \yii\db\ActiveRecord
{	

    public static function find($skipCompany = false)
    {
        if ($skipCompany) {
            return parent::find();
        } else {
            $session = Yii::$app->session;                
            return parent::find()->andFilterWhere(['company_id' => Yii::$app->session->get('company_id')]);
        }
    }         

}