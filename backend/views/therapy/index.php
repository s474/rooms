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
            'name',            
            [                
                'attribute'=>'needs_special_room',
                'format' => 'boolean',                              
            ],             

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Create Therapy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    
</div>
