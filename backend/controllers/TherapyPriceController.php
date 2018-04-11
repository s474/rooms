<?php

namespace backend\controllers;

use Yii;
use common\models\TherapyPrice;
use common\models\TherapyPriceSearch;
use common\models\Therapy;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TherapyPriceController implements the CRUD actions for TherapyPrice model.
 */
class TherapyPriceController extends Controller
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
     * Lists all TherapyPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TherapyPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TherapyPrice model.
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
     * Creates a new TherapyPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($therapy_id = null, $from_therapy = null)
    {
        $model = new TherapyPrice();
        $model->therapy_id = $therapy_id;                

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($from_therapy)
                return $this->redirect(['therapy/update', 'id' => $model->therapy_id]);
            else
                return $this->redirect(['index']);
        }        
        
        $ddTherapies = Therapy::find()
            ->select(['name'])
            ->where(['needs_special_room' => '1'])
            ->indexBy('id')
            ->column();
        
        return $this->render('create', [
            'model' => $model,
            'from_therapy' => $from_therapy,
            'ddTherapies' => $ddTherapies,            
        ]);
    }

    /**
     * Updates an existing TherapyPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $from_therapy = null)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($from_therapy)
                return $this->redirect(['therapy/update', 'id' => $model->therapy_id]);
            else
                return $this->redirect(['index']);
        }

        $ddTherapies = Therapy::find()
            ->select(['name'])
            ->where(['needs_special_room' => '1'])
            ->indexBy('id')
            ->column();        
        
        return $this->render('update', [
            'model' => $model,
            'from_therapy' => $from_therapy,
            'ddTherapies' => $ddTherapies,            
        ]);
    }

    /**
     * Deletes an existing TherapyPrice model.
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

    /**
     * Finds the TherapyPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TherapyPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TherapyPrice::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
