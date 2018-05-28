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
                    return Html::a($data->company->name, ['company/update', 'id' => $data->id]);
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
                    return Html::a($data->user->email, ['therapist/update', 'id' => $data->id]);
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
        <?= Html::a('Create Therapist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
