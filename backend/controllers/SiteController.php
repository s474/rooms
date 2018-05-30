<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','switch-session'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $adminAccs = \common\models\Administrator::find()->where(['user_id' => \Yii::$app->user->id])->all();
        $therapistAccs = \common\models\Therapist::find()->where(['user_id' => \Yii::$app->user->id])->all();
        $clientAccs = \common\models\Client::find()->where(['user_id' => \Yii::$app->user->id])->all();
        
        return $this->render('index', [
            'adminAccs' => $adminAccs,
            'therapistAccs' => $therapistAccs,
            'clientAccs' => $clientAccs,            
        ]);        
    }
    
    
    public function actionSwitchSession($id, $type)
    {                
        $class = '';
        if ($type == 'A') 
            $class = 'common\models\Administrator';
        if ($type == 'C') 
            $class = 'common\models\Client';
        if ($type == 'T') 
            $class = 'common\models\Therapist';               
        
        if ($class != '') {
            $model = $class::findOne($id);
            if (isset($model->id)) {
                $session = Yii::$app->session;
                $session->set('company_id', $model->company_id);
                $session->set('rms_id', $id);
                $session->set('rms_type', $type);
            }
        }
        
        return $this->redirect(['index']);
    }       
}
