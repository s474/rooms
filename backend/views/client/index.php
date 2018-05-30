<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
?>
<div class="client-index">

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
                        'attribute' => 'company',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->company->name, ['company/update', 'id' => $data->id]);
                        },
                        'visible' => \Yii::$app->user->can('super'),
                    ],
                    [
                        'attribute' => 'user',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->name, ['user/admin/update', 'id' => $data->user_id]);
                        },
                    ],
                    [
                        'attribute' => 'first_name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->user->first_name, ['user/admin/update', 'id' => $data->user_id]);
                        },
                    ],
                    [
                        'attribute' => 'last_name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->user->last_name, ['user/admin/update', 'id' => $data->user_id]);
                        },
                    ],                                
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a($data->user->email, ['client/update', 'id' => $data->id]);
                        },
                    ],
                    'notes',
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
                <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>    
       
</div>
