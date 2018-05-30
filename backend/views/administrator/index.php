<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdministratorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrators';
?>
<div class="administrator-index">

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
                            return Html::a($data->company->name, ['company/update', 'id' => $data->company_id]);
                        },
                        'visible' => \Yii::$app->user->can('super'),
                    ],            
                    [
                        'attribute' => 'user',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return (\Yii::$app->user->can('super')) ? 
                                Html::a($data->name, ['user/admin/update', 'id' => $data->user_id]) : 
                                $data->name;
                        },
                    ],
                    [
                        'attribute' => 'first_name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return (\Yii::$app->user->can('super')) ? 
                                Html::a($data->user->first_name, ['user/admin/update', 'id' => $data->user_id]) : 
                                Html::a($data->user->first_name, ['administrator/update', 'id' => $data->id]);                                
                        },
                    ],
                    [
                        'attribute' => 'last_name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return (\Yii::$app->user->can('super')) ? 
                                Html::a($data->user->last_name, ['user/admin/update', 'id' => $data->user_id]) : 
                                Html::a($data->user->last_name, ['administrator/update', 'id' => $data->id]);
                        },
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
        </div>        
        <div class="box-footer">
        <!--The footer of the box-->
        </div>        
    </div>
    
    <p>
        <?= Html::a('Create Administrator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
