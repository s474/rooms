<?php

namespace backend\controllers;

use Yii;
use common\models\Therapy;
use common\models\TherapistDoesTherapy;
use common\models\TherapistDoesTherapySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TherapistDoesTherapyController implements the CRUD actions for TherapistDoesTherapy model.
 */
class TherapistDoesTherapyController extends \common\components\RoomsCont
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
                        'roles' => ['viewTherapistDoesTherapy'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create','update','delete'],
                        'roles' => ['editTherapistDoesTherapy'],
                    ],                    
                ],                
            ],            
        ];
    }

    /**
     * Lists all TherapistDoesTherapy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TherapistDoesTherapySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TherapistDoesTherapy model.
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
     * Creates a new TherapistDoesTherapy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($therapist_id)
    {
        $model = new TherapistDoesTherapy();
        $model->therapist_id = $therapist_id;                
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['therapist/update', 'id' => $model->therapist_id]);
        }

        $ddTherapies = Therapy::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();        
        
        return $this->render('create', [
            'model' => $model,
            'ddTherapies' => $ddTherapies,
        ]);
    }

    /**
     * Updates an existing TherapistDoesTherapy model.
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
     * Deletes an existing TherapistDoesTherapy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $therapist_id = $model->therapist_id;
        $model->delete();

        return $this->redirect(['therapist/update', 'id' => $therapist_id]);
    }

    /**
     * Finds the TherapistDoesTherapy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TherapistDoesTherapy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TherapistDoesTherapy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
