<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
?>
<div class="room-index">
    
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['room/update', 'id' => $data->id]);
                },
            ],
            [
                'label' => 'Therapies',
                'value' => function ($data) {
                    $therapies = array();
                    foreach ($data->roomSupportsTherapies as $therapy) {
                        $therapies[] = $therapy->therapy->name;
                    } 
                    return implode(', ',$therapies);
                },
            ],                        
            [                
                'attribute'=>'location_id',
                'format' => 'raw',                
                'value' => 'location.name',
                'filter' => ArrayHelper::map(
                    common\models\Location::find()->asArray()->all(), 'id', 'name'                        
                ),
                'value' => function ($data) {
                    return Html::a($data->location->name, ['location/update', 'id' => $data->location_id]);
                },                
            ],            
            [
                'attribute' => 'colour',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div style="width: 25px; height: 20px; border: solid 1px #222; background-color:' . $data->colour . '"></span>';
                },
            ],                        
            ['class' => 'yii\grid\ActionColumn'],                       
        ],
    ]); ?>    

    <p>
        <?= Html::a('Create Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <br />
    
    <h1><?= Locations ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderLocation,
        'filterModel' => $searchModelLocation,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['location/update', 'id' => $data->id]);
                },
            ],
            'address_line_1',            
            'postcode',                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'View'),
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {                        
                        $url = Url::to(['location/view', 'id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = Url::to(['location/update', 'id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = Url::to(['location/delete', 'id' => $model->id]);
                        return $url;
                    }
                }
            ],                                    
        ],
    ]); ?>    
    
    <p>
        <?= Html::a('Create Location', ['location/create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
