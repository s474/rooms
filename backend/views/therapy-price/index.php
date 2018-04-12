<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TherapyPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prices';
?>
<div class="therapy-price-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'therapy.name',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a($data->therapy->name, ['therapy-price/update', 'id' => $data->id]);
                },
            ],
            'minutes_duration',
            'description',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Price', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
