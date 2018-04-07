<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TherapistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Therapists';
?>
<div class="therapist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->name, ['therapist/update', 'id' => $data->id]);
                },
            ],
            [
                'label' => 'Therapies',
                'value' => function ($data) {
                    $therapies = array();
                    foreach ($data->therapistDoesTherapies as $therapy) {
                        $therapies[] = $therapy->therapy->name;
                    } 
                    return implode(', ',$therapies);
                },
            ],                        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        
    <p>
        <?= Html::a('Create Therapist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
