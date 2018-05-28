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
            ],            
            [
                'attribute' => 'user',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['user/admin/update', 'id' => $data->user_id]);
                },
            ],                        
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->user->email, ['administrator/update', 'id' => $data->id]);
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
    
    <p>
        <?= Html::a('Create Administrator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
