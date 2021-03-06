<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TherapistDoesTherapySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Therapist Does Therapies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="therapist-does-therapy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Therapist Does Therapy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'therapist_id',
            'therapy_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
