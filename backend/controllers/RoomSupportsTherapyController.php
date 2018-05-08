<?php

namespace backend\controllers;

use Yii;
use common\models\RoomSupportsTherapy;
use common\models\RoomSupportsTherapySearch;
use common\models\Therapy;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RoomSupportsTherapyController implements the CRUD actions for RoomSupportsTherapy model.
 */
class RoomSupportsTherapyController extends Controller
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
                        'roles' => ['viewRoomSupportsTherapy'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['editRoomSupportsTherapy'],
                    ],                    
                ],                
            ],            
        ];
    }

    /**
     * Lists all RoomSupportsTherapy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomSupportsTherapySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RoomSupportsTherapy model.
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
     * Creates a new RoomSupportsTherapy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($room_id)
    {
        $model = new RoomSupportsTherapy();
        $model->room_id = $room_id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['room/update', 'id' => $model->room_id]);
        }
               
        $ddTherapies = Therapy::find()
            ->select(['name'])
            ->where(['needs_special_room' => '1'])
            ->indexBy('id')
            ->column();
        
        return $this->render('create', [
            'model' => $model,
            'ddTherapies' => $ddTherapies,
        ]);
    }

    /**
     * Updates an existing RoomSupportsTherapy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RoomSupportsTherapy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $room_id = $model->room_id;
        $model->delete();

        return $this->redirect(['room/update', 'id' => $room_id]);
    }    
    
    /**
     * Finds the RoomSupportsTherapy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoomSupportsTherapy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoomSupportsTherapy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
