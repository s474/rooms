<?php

namespace backend\controllers;

use Yii;
use common\models\Room;
use common\models\RoomSearch;
use common\models\Location;
use common\models\LocationSearch;
use common\models\RoomSupportsTherapySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends Controller
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
        ];
    }

    /**
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelLocation = new LocationSearch();
        $dataProviderLocation = $searchModelLocation->search(Yii::$app->request->queryParams);               
        
        $searchModel = new RoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelLocation' => $searchModelLocation,
            'dataProviderLocation' => $dataProviderLocation,            
        ]);
    }

    /**
     * Displays a single Room model.
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
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Room();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Room model.
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

        $searchModelTherapies = new RoomSupportsTherapySearch();
        $searchModelTherapies->room_id = $model->id;
        $dataProviderTherapies = $searchModelTherapies->search(Yii::$app->request->queryParams);        
        
        return $this->render('update', [
            'model' => $model,
            'searchModelTherapies' => $searchModelTherapies,
            'dataProviderTherapies' => $dataProviderTherapies,            
        ]);
    }

    /**
     * Deletes an existing Room model.
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

    public function actionFullcaldendarResources()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rooms = Room::find()->all();
        $resources = array();
        
        foreach ($rooms AS $room) {            
            $resource = array();
            $resource['id'] = $room->id;         
            $resource['title'] = $room->name;
            $resource['eventColor'] = '#' . 'ff0000';
            $resources[] = $resource;
        }

        return $resources;
    }    
    
    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
