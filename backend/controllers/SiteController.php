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
        //$msg = "SS1 : session company_id: " . Yii::$app->session->get('company_id');
        //mail("chrts.offire@gmail.com","Debugulon 3 SS1 " . time(),$msg); 
        
        $class = 'common\models\\' . $type;

        if ($class != 'common\models\\') {
            
            
            //$model = $class::findOne($id);
           
            //This worked nicey
            //$model = $class::find('bLROP')->where(['id' => $id])->one();
            
            //Can I do skipCompany then
            $model = $class::find(true)->where(['id' => $id])->one();
            
            //var_dump($modelOne);
            //var_dump($model);
            
            if (isset($model->id)) {
                
                //$msg = "1: session company_id: " . Yii::$app->session->get('company_id');
                //mail("chrts.offire@gmail.com","Debugulon 1 actionSwitchSession",$msg);                
                
                $session = Yii::$app->session;
                $session->set('company_id', $model->company_id);
                $session->set('company_name', $model->company->name);                
                $session->set('rms_id', $id);
                $session->set('rms_class', $class);
                $session->set('rms_type', $type);
                
                //$msg = "2: session company_id: " . Yii::$app->session->get('company_id');
                //mail("chrts.offire@gmail.com","Debugulon 2 actionSwitchSession",$msg);                  
                
                //Commenting un commenting makes the CHECK/NOT CHECK above for findOne/find work!!
                //$session->set('ACK', '*:' . $session['company_id'] . ' **'.time()); 
                
                //$msg = "SS2 : session company_id: " . Yii::$app->session->get('company_id');
                //mail("chrts.offire@gmail.com","Debugulon 3 SS2 " . time(),$msg); 
                
                
                
            }
        }
        
        /*
        $adminAccs = \common\models\Administrator::find()->where(['user_id' => \Yii::$app->user->id])->all();
        $therapistAccs = \common\models\Therapist::find()->where(['user_id' => \Yii::$app->user->id])->all();
        $clientAccs = \common\models\Client::find()->where(['user_id' => \Yii::$app->user->id])->all();        
        
        return $this->render('index', [
            'model' => $model,
            'modelOne' => $modelOne,
            'adminAccs' => $adminAccs,
            'therapistAccs' => $therapistAccs,
            'clientAccs' => $clientAccs,              
        ]);        
        */
        
        //return $this->redirect(['index', 'class' => $class]);
        
        //return $this->redirect(['index']);
    }       
}
