<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TherapySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Therapies';
?>
<div class="therapy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'company',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->company->name, ['company/update', 'id' => $data->id]);
                },
                'visible' => \Yii::$app->user->can('super'),                        
            ],            
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['therapy/update', 'id' => $data->id]);
                },
            ],            
            [                
                'attribute'=>'needs_special_room',
                'format' => 'boolean',                              
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($data) {
                    return Yii::$app->formatter->asDatetime($data->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($data) {
                    return Yii::$app->formatter->asDatetime($data->updated_at);
                },
            ],                        

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Create Therapy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>
