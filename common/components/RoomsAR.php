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
            if ($join)
                return parent::find()->joinWith([$join])->andFilterWhere(['company_id' => Yii::$app->session->get('company_id')]);
            else
                return parent::find()->andFilterWhere(['company_id' => Yii::$app->session->get('company_id')]);
        }
    }         

}
