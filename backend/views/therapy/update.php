<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Therapy */

$this->title = 'Update Therapy: ' . $model->name;
?>
<div class="therapy-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="box">                
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>            
            <div class="box-tools pull-right">
                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>                
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>

    <div class="box">                
        <div class="box-header with-border">
            <h3 class="box-title">Prices</h3>            
            <div class="box-tools pull-right">
                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>                
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProviderPrices,
                'filterModel' => $searchModelPrices,
                'columns' => [
                    [
                        'attribute' => 'minutes_duration',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->minutes_duration, ['therapy-price/update', 'id' => $data->id, 'from_therapy' => $data->therapy_id]);
                        },
                    ],            
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->description, ['therapy-price/update', 'id' => $data->id, 'from_therapy' => $data->therapy_id]);
                        },
                    ],
                    [
                        'attribute' => 'price',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a(Yii::$app->formatter->asCurrency($data->price), ['therapy-price/update', 'id' => $data->id, 'from_therapy' => $data->therapy_id]);
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}',
                        'buttons' => [
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
                            if ($action === 'delete') {
                                $url = Url::to(['therapy-price/delete', 'id' => $model->id, 'from_therapy' => $model->therapy_id]);
                                return $url;
                            }
                        }
                    ],                                    
                ],
            ]); ?>    

            <p>
                <?= Html::a('Add', ['therapy-price/create', 'therapy_id' => $model->id, 'from_therapy' => $model->id], ['class' => 'btn btn-success']) ?>
            </p>
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>    

</div>
