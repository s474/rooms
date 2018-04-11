<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Room */

$this->title = 'Update Room: ' . $model->name;
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h1><?= Therapies ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProviderTherapies,
        'filterModel' => $searchModelTherapies,
        'columns' => [
            'therapy.name',               
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'delete') {
                        $url = Url::to(['room-supports-therapy/delete', 'id' => $model->id]);
                        return $url;
                    }
                }
            ],                                    
        ],
    ]); ?>    

    <p>
        <?= Html::a('Add', ['room-supports-therapy/create', 'room_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
