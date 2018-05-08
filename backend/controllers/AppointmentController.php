<?php

namespace backend\controllers;

use Yii;
use common\models\Appointment;
use common\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['viewAppointment'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['editAppointment'],
                    ],                    
                ],                
            ],            
        ];
    }        

    /**
     * Lists all Appointment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 8;        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Appointment models.
     * @return mixed
     */
    public function actionCalendar()
    {
        /*
        $searchModel = new AppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 8;
        */
        
        return $this->render('calendar', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }    
    
    /**
     * Displays a single Appointment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Appointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Appointment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Appointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Appointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    } 
    
    public function actionFullcaldendarEvents($start = NULL, $end = NULL, $_ = NULL)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $appointments = Appointment::find()->all();
        $events = array();
        
        foreach ($appointments AS $appointment) {            
            $event = array();
            $event['id'] = $appointment->id;
            $event['resourceId'] = $appointment->room_id;            
            $event['title'] = $appointment->therapist->name . ', ' . $appointment->therapyPrice->minutes_duration . '′';
            $event['start'] = date('Y-m-d\TH:i:s\Z',strtotime($appointment->start));
            $event['end'] = date('Y-m-d\TH:i:s\Z',strtotime($appointment->end));            
            $events[] = $event;
        }

        return $events;
    }    
    
    /**
     * Finds the Appointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appointment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
