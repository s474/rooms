<?php
namespace common\components;

use Yii;

class RoomsCont extends \yii\web\Controller
{	

    public function beforeAction($event)
    {
        if (!Yii::$app->user->can('super') && !Yii::$app->session->get('company_id')) 
            return $this->redirect(['site/index']);
        return parent::beforeAction($event);
    }    
    
}
