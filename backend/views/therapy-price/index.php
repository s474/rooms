<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TherapyPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prices';
?>
<div class="therapy-price-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    [
                        'attribute' => 'minutes_duration',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->minutes_duration, ['therapy-price/update', 'id' => $data->id]);
                        },
                    ],            
                    [
                        'attribute' => 'therapy.name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->therapy->name, ['therapy/update', 'id' => $data->therapy_id]);
                        },
                    ],
                    'description',
                    'price:currency',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <p>
                <?= Html::a('Create Price', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>
    
</div>
