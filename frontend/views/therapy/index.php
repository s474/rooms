<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TherapySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Therapies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Therapy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'needs_special_room',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
