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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_id',
            'user_id',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Create Administrator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
